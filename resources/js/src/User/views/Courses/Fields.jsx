import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        title: '',
        description: '',
        price: '',
        duration_course: '',
        method_holding: '',
        deleted_at: '',
        created_at: '',
        updated_at: ''
    });

    return [formData, setFormData];
};

export default useField;
