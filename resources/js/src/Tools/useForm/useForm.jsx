import { useState } from 'react';

const useForm = (useField = null) => {
    const [formData, setFormData] = useField ? useField() : useState({});

    const handleFromChange = (e, customValue = null) => {
        try {
            // اگر event موجود بود، آن را مدیریت کن
            if (e) {
                const { name, value, type } = e.target;

                // مدیریت فایل‌ها
                if (type === 'file') {
                    const file = e.target.files[0];
                    if (file) {
                        // handleUploadFile(file);
                    }
                } else {
                    // استفاده از event.target برای مقداردهی
                    setFormData((prevData) => ({
                        ...prevData,
                        [name]: value,
                    }));
                }
            }

            // اگر customValue پاس داده شده بود، آن را مدیریت کن
            if (customValue) {
                const [fieldName, fieldValue] = customValue;

                setFormData((prevData) => ({
                    ...prevData,
                    [fieldName]: Array.isArray(prevData[fieldName])
                        ? [...prevData[fieldName], ...fieldValue] // اضافه کردن به آرایه
                        : fieldValue,
                }));
            }
        } catch (error) {
            console.error('Error in handleFromChange:', error);
        }
    };

    return [formData, setFormData, handleFromChange];
};

export default useForm;
