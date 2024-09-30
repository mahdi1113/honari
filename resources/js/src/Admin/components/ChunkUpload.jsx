import React, { useState, useCallback } from "react";
import { useDropzone } from "react-dropzone";
import { Button } from "react-bootstrap";
import axiosClient from "../../../axios"; // مطمئن شوید این مسیر درست است
import BatchIdGenerator from "./BatchIdGenerator";
import ReactPlayer from "react-player";
import { CProgress } from "@coreui/react";
import "../../css/FileUpload.css"; // برای استایل سفارشی

const ChunkUpload = ({ onUploadComplete }) => {
  const [selectedFile, setSelectedFile] = useState(null);
  const [status, setStatus] = useState("");
  const [progress, setProgress] = useState(0);
  const [errors, setErrors] = useState(null);
  const [video, setVideo] = useState(null);
  const [progressColor, setProgressColor] = useState("info");

  const onDrop = useCallback((acceptedFiles) => {
    setSelectedFile(acceptedFiles[0]);
  }, []);

  const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop });

  const handleFileUpload = () => {
    if (!selectedFile) {
      alert("Please select a file to upload.");
      return;
    }

    const chunkSize = 5 * 1024 * 1024;
    const totalChunks =
      selectedFile.size % chunkSize === 0
        ? selectedFile.size / chunkSize
        : Math.floor(selectedFile.size / chunkSize) + 1;

    const chunkProgress = 100 / totalChunks;
    let chunkNumber = 0;
    let start = 0;
    let end = chunkSize;
    const newBatchId = BatchIdGenerator(10); // Generate batch ID

    const uploadNextChunk = async () => {
      if (chunkNumber < totalChunks) {
        const chunk = selectedFile.slice(start, end, selectedFile.type);
        const formData = new FormData();

        formData.append("video", chunk, selectedFile.name);
        formData.append("chunkNumber", chunkNumber + 1);
        formData.append("totalChunks", totalChunks);
        formData.append("originalname", selectedFile.name);
        formData.append("batch_id", newBatchId);

        axiosClient
          .post("store_Video", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((res) => {
            if (chunkNumber + 1 === totalChunks) {
              console.log("Upload completed:", res);
              setVideo(`http://localhost:8000/upload/images/${res.data.data.url}`);
              setProgressColor("success");

              // Return batch ID to parent component
              if (onUploadComplete) {
                onUploadComplete(newBatchId); // Call the callback function with newBatchId
              }

              setTimeout(() => {
                setProgress(0); // Reset progress to 0 after 5 seconds
                setProgressColor("info");
              }, 5000);
            }

            const temp = `Chunk ${chunkNumber + 1}/${totalChunks} uploaded successfully`;
            setStatus(temp);
            setProgress(Math.round((chunkNumber + 1) * chunkProgress));

            chunkNumber++;
            start = end;
            end = Math.min(start + chunkSize, selectedFile.size);

            uploadNextChunk();
          })
          .catch((error) => {
            console.log(error)
            if (error.response) {
              setErrors(error.response.data.errors);
              console.log(errors);
            } else {
              console.error("Error uploading chunk:", error);
            }
          });
      } else {
        setProgress(100);
        setSelectedFile(null);
        setStatus("File upload completed");
      }
    };

    uploadNextChunk();
  };

  return (
    <div>
      <CProgress className="mb-5 custom-progress" color={progressColor} variant="striped" animated value={progress}>
        {progress}%
      </CProgress>
      <div {...getRootProps()} className={`dropzone ${isDragActive ? "active" : ""}`}>
        <input {...getInputProps()} />
        {isDragActive ? (
          <p>فایل را اینجا رها کنید ...</p>
        ) : (
          <p>یک فایل ویدیویی را در اینجا بکشید و رها کنید یا برای انتخاب یکی کلیک کنید</p>
        )}
      </div>

      <Button className="mt-4 mb-5" variant="primary" onClick={handleFileUpload} disabled={!selectedFile}>
        آپلود فایل
      </Button>

      {errors?.file ? (
        <span className="text-danger font-size-error pt-2">{errors.file[0]}</span>
      ) : null}

      {video && (
        <div className="video-wrapper">
          <ReactPlayer url={video} controls width="100%" height="auto" playing={false} loop={false} muted={false} playbackRate={1.0} />
        </div>
      )}
    </div>
  );
};

export default ChunkUpload;
