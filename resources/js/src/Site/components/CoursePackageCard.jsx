import React from 'react';
import { CCard, CCardBody, CCardImage, CCardTitle, CButton } from '@coreui/react-pro';
import '../css/CoursePackageCard.css'; // فایل CSS برای استایل‌ها

const CoursePackageCard = ({ ImgSrc, Title, link }) => {
    return (
        <div className="mt-4 d-flex justify-content-center">
            <CCard style={{ width: '18rem' }} className="shadow-lg border-0 card-hover">
                <div className="image-container">
                    <CCardImage
                        orientation="top"
                        src={ImgSrc}
                        alt={Title}
                        className="card-img-top-hover"
                    />
                </div>
                <CCardBody className="text-center">
                    <CCardTitle className="text-dark" style={{ fontSize: '1.25rem', fontWeight: 'bold' }}>
                        {Title}
                    </CCardTitle>
                    <CButton href={link} color="primary" className="mt-2 px-4 py-2 btn-hover">
                        مشاهده بیشتر
                    </CButton>
                </CCardBody>
            </CCard>
        </div>
    );
};

export default CoursePackageCard;
