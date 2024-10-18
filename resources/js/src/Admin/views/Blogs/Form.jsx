import {
    CFormSelect,
    CInputGroup,
    CInputGroupText,
} from "@coreui/react";
import {
    CButton,
    CForm,
    CFormInput,
} from "@coreui/react-pro";
import { Editor } from "@tinymce/tinymce-react";
import React, { useEffect, useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
import axiosClient from "../../../../axios";

const Form = ({ formData, handleFromChange, onSubmit }) => {
    const [errors, setErrors] = useState(null);
    const [image, setImage] = useState(null);
    const [imageWithBatchId, setImageWithBatchId] = useState('');

    // تابع تولید batch_id
    function generateBatchId(length = 10) {
        const characters =
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let batchId = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            batchId += characters[randomIndex];
        }
        return batchId;
    }

    // آپلود تصویر در هنگام انتخاب فایل
    const handleChange = (e) => {
        const formData = new FormData();
        formData.append("file", e.target.files[0]);
        const newBatchId = generateBatchId(); // تولید batch_id جدید
        formData.append("batch_id", newBatchId);

        axiosClient
            .post("store_media", formData)
            .then((res) => {
                console.log(res.data.data.url);
                handleFromChange(null, ["file_batch_id", newBatchId]);
                setImage(res.data.data.url); // ذخیره URL تصویر
            })
            .catch((error) => {
                if (error.response) {
                    setErrors(error.response.data.errors);
                    console.log(errors);
                }
            });
    };


    const handleImageUpload = (blobInfo, progress, failure) => {
        return new Promise((resolve, reject) => {
            const formData = new FormData();
            formData.append("file", blobInfo.blob(), blobInfo.filename());
            const newBatchId = generateBatchId();
            formData.append("batch_id", newBatchId);

            axiosClient
                .post("store_media", formData)
                .then((response) => {
                    if (response.status === 200) {
                        const json = response.data.data;

                        // مطمئن شوید که فقط URL تصویر برگردانده می‌شود
                        const imageUrl = json.url;

                        handleFromChange(null, [
                            "tinymce_batch_id",
                            [newBatchId],
                        ]);


                        if (!imageUrl || typeof imageUrl !== "string") {
                            reject("Invalid JSON: " + JSON.stringify(json));
                            return;
                        }

                        resolve(imageUrl);
                    } else {
                        reject("HTTP Error: " + response.status);
                    }
                })
                .catch((error) => {
                    reject("Image upload failed: " + error.message);
                    if (failure && typeof failure === "function") {
                        failure("Image upload failed");
                    }
                });
        });
    };

    const navigate = useNavigate();
    useEffect(() => {
    }, [formData]);

    console.log("FormData ::", formData)

    return (
        <CForm>
            <div className="d-flex flex-column">
                <div className="d-flex flex-column justify-content-around mb-lg-3">
                    <CInputGroup className="mb-3">
                        <CInputGroupText className="text-wrap" id="basic-addon1">
                            عنوان
                        </CInputGroupText>
                        <CFormInput
                            name="title"
                            placeholder=""
                            value={formData?.title}
                            onChange={handleFromChange}
                        />
                    </CInputGroup>

                    <Editor
                        apiKey="hl8b4x6wo2iexda7aqk0dnj65lh0uqfr2fwwrzm8w3uv0xzt"
                        onEditorChange={(newValue, editor) => {
                            handleFromChange(null, ["description", newValue]);
                        }}
                        init={{
                            selector: "textarea", // انتخاب textarea
                            plugins: "image",
                            toolbar:
                                "undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                            images_file_types: "jpg,svg,webp",
                            directionality: "rtl",
                            automatic_uploads: true,
                            images_reuse_filename: true,
                            images_upload_handler: handleImageUpload,
                        }}
                        value={formData?.description}
                    />

                    <CInputGroup className="mb-3 mt-3">
                        <CInputGroupText className="text-wrap" id="basic-addon1">
                            وضعیت مقاله
                        </CInputGroupText>
                        <CFormSelect
                            aria-label="Large select example"
                            name="status"
                            onChange={handleFromChange}
                            value={formData?.status || ""}
                        >
                            <option value="">انتخاب کنید</option>
                            <option value="active">فعال</option>
                            <option value="inactive">غیر فعال</option>
                        </CFormSelect>
                    </CInputGroup>

                    <div className="mb-3 mt-3">
                        <label htmlFor="formFile" className="form-label">
                            کاور مقاله را انتخاب کنید ...
                        </label>
                        <div className="my-2">
                            <CFormInput
                                type="file"
                                onChange={(e) => handleChange(e)}
                            />
                        </div>
                        {errors?.file ? (
                            <span className="text-danger font-size-error pt-2">
                                {errors.file[0]}
                            </span>
                        ) : null}
                    </div>

                    {(formData?.thumbnail || image) && (
    <img
        style={{ width: "100px" }}
        className="imageUpload"
        src={image || formData?.thumbnail}
        alt="آپلود شده"
    />
)}

                </div>
                <div className="d-flex flex-column-reverse gap-5 flex-lg-row justify-content-center align-items-stretch mb-4">
                    <div className="col-lg-2">
                        <CButton
                            className="text-white w-100"
                            color="secondary"
                            shape="rounded-pill"
                            onClick={() => navigate(-1)}
                        >
                            انصراف
                        </CButton>
                    </div>
                    <div className="col-lg-2">
                        <CButton
                            className="text-white w-100"
                            color="success"
                            shape="rounded-pill"
                            onClick={onSubmit}
                        >
                            تایید
                        </CButton>
                    </div>
                </div>
            </div>
        </CForm>
    );
};

export default Form;
