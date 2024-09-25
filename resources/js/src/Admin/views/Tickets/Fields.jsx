import { useState } from 'react';

const useField = () => {
    const [formData, setFormData] = useState({
        course_id: '',
        description: '',
        title: '',
        id: '',
    });

    return [formData, setFormData];
};

export default useField;
