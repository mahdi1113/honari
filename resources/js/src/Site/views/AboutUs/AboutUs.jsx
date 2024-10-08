import pic from'../../assets/images/react.jpg';
const AboutUs = () =>{

    return (
        <>
            <div className="d-flex flex-column justify-content-around flex-md-row">
                <div className='col-md-6'>
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
                <div className='col-md-6'>
                    <img src={pic} height={'200rem'} className="img-fluid"/>
                </div>

            </div>
        </>
    )
}

export default AboutUs;
