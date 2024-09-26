import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        id: '',
        topic: '',
        title: '',
        description: '',
        duration: '',
        status: '',
        course_id: '',
        deleted_at: '',
        created_at: '',
        updated_at: '',

    });

    return [formData, setFormData];
};

export default useField;
