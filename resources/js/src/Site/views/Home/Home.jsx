import React, { useEffect, useState } from "react";
import TopPic from'../../assets/images/main-Picture.jpg';
import BookPic from'../../assets/images/Book.jpg';
import openbook from'../../assets/images/openbook.jpg';
import redbook from'../../assets/images/redbook.jpg';
import { CButton, CNavLink } from "@coreui/react-pro";
import CIcon from "@coreui/icons-react";
import { cisEducation } from "@coreui/icons-pro";
import PackageImage from "../../components/PackageImage";
import angular from'../../assets/images/angular.jpg';
import newImage from'../../assets/images/img/img (1).jpeg';
import react from'../../assets/images/react.jpg';
import vue from'../../assets/images/vue.jpg';
import axiosClient from "../../../../axios";
import CoursePackageCard from "../../components/CoursePackageCard";

const images = [];

const loadImages = async () => {
    const promises = [];
    for (let i = 1; i <= 12; i++) {
      promises.push(import(`../../assets/images/img/img (${i}).jpeg`));
    }
    const images = await Promise.all(promises);
    return images.map((image) => image.default);
  };
console.log(images);
const packages=[
    {
        title: 'دوره خطاطی',
        image: redbook,
        link: '#/product/1',
    },
    {
        title: 'دوره خطاطی',
        image: openbook,
        link: '#/product/1',
    },
    {
        title: 'دوره خطاطی',
        image: redbook,
        link: '#/product/1',
    },
    {
        title: 'دوره خطاطی',
        image: openbook,
        link: '#/product/1',
    },
    {
        title: 'دوره خطاطی',
        image: redbook,
        link: '#/product/1',
    },
    {
        title: 'دوره خطاطی',
        image: openbook,
        link: '#/product/1',
    },
]


const Home = () => {
    const [images, setImages] = React.useState([]);

    useEffect(() => {
        loadImages().then(setImages);
    }, []);
    // const [packages, setPackages] = useState([]);

    // useEffect(() => {
    //     console.log('aaa');
    //     async function getPackages() {
    //         console.log('bbbb');
    //         const URL = 'courses' ;
    //         axiosClient.get(URL)
    //             .then((response) => {
    //                 console.log(response);
    //                 })
    //                 .catch((error) => {
    //                     console.log(error);
    //                 })

    //     }
    //     if(packages.length === 0)
    //         getPackages()
    // },[])

    return (
    <>
        <div className="d-flex flex-column-reverse flex-md-row justify-content-between align-items-center gap-1 text-center mb-5">
            <div className="w-50">
                <h1>آکادمی خطاطی</h1>
                <h1>علی رحیمی</h1>
                <div className="big-dash-divider text-nowrap"></div>
                <CNavLink href="#/products">
                    <CButton className="mt-lg-5 p-3" color="primary" shape="rounded-pill">
                        <CIcon className="me-2" icon={cisEducation}/>
                        مشاهده دوره های آموزشی
                    </CButton>
                </CNavLink>
            </div>
            <div className="home-img-main mb-5">
                <img src={TopPic} width={'400vw'} height={550}/>
            </div>
        </div>

        <div className="mb-5">
            <h1 className="text-center mb-5">دوره های آموزشی</h1>
            <div className="d-flex flex-column flex-wrap flex-lg-row justify-content-lg-evenly align-items-center">
                {packages.map((coursePackage ,index)=>(
                    <CoursePackageCard
                    ImgSrc={coursePackage.image}
                    Title={coursePackage.title}
                    link={coursePackage.link}
                />
                ))}
            </div>
        </div>
        <div className="mb-5">
            <h1 className="text-center mb-5">آثار</h1>
            <div className="d-flex justify-content-center overflow-hidden mb-3">
                <div className="d-flex flex-nowrap home-logos">
                    <div className="home-logos-slide">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                    <div className="home-logos-slide">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                </div>
            </div>
            {/* <div className="d-flex justify-content-center overflow-hidden mb-3">
                <div className="d-flex flex-nowrap home-logos-reverse">
                    <div className="home-logos-slide-reverse">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                    <div className="home-logos-slide-reverse">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                </div>
            </div>
            <div className="d-flex justify-content-center overflow-hidden mb-3">
                <div className="d-flex flex-nowrap home-logos">
                    <div className="home-logos-slide">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                    <div className="home-logos-slide">
                        {images.map((logo, index) => (
                            <img key={index} src={logo} alt={`Logo ${index}`} height={100} />
                        ))}
                    </div>
                </div>
            </div> */}
        </div>

        <div className="mb-5">
        <div className="d-flex flex-column justify-content-around flex-md-row mb-5">
            <div>
                <h3>درباره استاد</h3>
                <div className="ms-3">
                    <li>فارغ التحصیل انجمن خوشنویسان ایران</li>
                    <li>اساتید : استاد جهانگیر کوچک زاده ،
                    استاد عبدالله فرادی ، استاد یدالله کابلی و استاد کیخسرو خروش</li>
                    <li>برپائی نمایشگاه انفرادی در ایران و اروپا</li>
                    <li>شرکت در نمایشگاههای گروهی</li>
                    <li>تدریس در دانشگاه</li>
                </div>
                </div>
                <div>
                    <img src={react} height={'300rem'} className="img-fluid"/>
                </div>
            </div>
        </div>

    </>
);
};

export default Home;
