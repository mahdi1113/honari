import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        user_name: '',
        email: '',
        phone: '',
        role: '',
        password: '',
    });

    return [formData, setFormData];
};

export default useField;
