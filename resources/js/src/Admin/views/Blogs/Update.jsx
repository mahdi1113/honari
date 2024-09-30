import React, { useState } from 'react';
import ChunkUpload from '../../components/ChunkUpload'; // مطمئن شوید مسیر درست است

const Update = () => {
  // تعریف ParentComponent
  const ParentComponent = () => {
    const [batchId, setBatchId] = useState(null); // استفاده از useState برای مدیریت batchId

    // تابعی که بعد از اتمام آپلود فراخوانی می‌شود
    const handleUploadComplete = (newBatchId) => {
      setBatchId(newBatchId); // مقدار batchId را در state قرار می‌دهیم
      console.log("Batch ID received from ChunkUpload:", newBatchId);
    };

    return (
      <div>
        <h1>Video Upload</h1>
        {/* ChunkUpload و ارسال callback */}
        <ChunkUpload onUploadComplete={handleUploadComplete} />
        {/* نمایش Batch ID اگر موجود باشد */}

      </div>
    );
  };

  // در اینجا ParentComponent را رندر می‌کنیم
  return <ParentComponent />;
};

export default Update;
