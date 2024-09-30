import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        id: '',
        title: '',
        description: '',
        status: '',
        file_batch_id: '',
        tinymce_batch_id: []
    });

    return [formData, setFormData];
};

export default useField;
