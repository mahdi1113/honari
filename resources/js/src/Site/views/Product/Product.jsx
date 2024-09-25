import pic from'../../assets/images/react.jpg';
import PackageImage from '../../components/PackageImage';
import redbook from'../../assets/images/redbook.jpg';
import react1 from'../../assets/images/react1.jpg';
import openbook from'../../assets/images/openbook.jpg';
import { CButton, CCol, CContainer, CRow } from '@coreui/react-pro';
import { cisEducation } from '@coreui/icons-pro';
import CIcon from '@coreui/icons-react';
import { useEffect, useRef, useState } from 'react';
import { CForm } from '@coreui/react';
import axiosClient from '../../../../axios';
import useAPI from '../../../Tools/API/useAPI';
const ProductData=
    {
        title: 'دوره خطاطی',
        image: react1,
        description:`هنرجویان عزیزی که کارهای من را دنبال میکنند وعلاقمند به یادگیری هنر زیبای ” نقاشیخط” میباشند میتوانند از این دوره آموزشی استفاده نمایند . در این دوره صفر تا صدتکنیک ها وابزاری که در اجرای اثارم بکار گرفتم ، آموزش داده میشود ازویژگیهای مهم و عناصر اصلی در نقاشیخط خلاقیت و نو آوری میباشد ولذا آشنائی با شیوه ها وتکنیک های متنوع به شما کمک میکند تا در اجرای کارها بیشتر خلاقیت و نو آوری را به اجرا درآورید .`,
        price: 600000,
        teacher: 'علی رحیمی',
        duriation: 6,
        method: 'non-present',
        intro: `با یاد گیری این دوره آموزشی شما قادر خواهید بود آثاری با نگاه نقاشانه و تفکر خوشنویسانه وگرافیستی اجرا کنید
بعد از این دوره شما با ابزارها ، تکنیک ها و نحوه بکار گیری آنها برای تلفیق هنرمندانه نقاشی و خوشنویسی و دیگر عناصر آشنا می شوید .

امیدوارم این دوره برای تمامی شما عزیزان مفید باشد.`,
        headlines:['استفاده از تکسچر ها جهت زمینه سازی',
            'طراحی حروف وکلمات',
            'قلمگیری حروف وکلمات',
            'سه بعدی کردن حروف و کلمات( سایه زدن بوسیله رنگ و قلم )',
            ],
        link: '#'
    }

const faq = [
    {
        title:'چگونه سوالات متداول را بنویسیم',
        description: 'کلید سوالات متداول معنادار در قالب سوالات آن دقیقاً همانطور که کاربران از آنها می پرسند نهفته است. بنابراین ، در اینجا 3 هک نوشتن سوال عملی برای جلوگیری از سرقت اثربخشی سوالات متداول در سوالات ضعیف آورده شده است.'
    },
    {
        title:'سوالات متداول چیست؟',
        description: 'پرتکرارترین سوالات مربوط به هر صفحه گلچین می‌شود و در قالب سوالات متداول یا همان frequently asked questions به صفحه اضافه می‌شود. متخصصان معمولا این پرسش و پاسخ‌ها را با طرز کار توییتر مشابه می‌دانند و بخش مهمی از استرکچر دیتا را تشکیل می‌دهند.'
    },
    {
        title:'چگونه سوالات متداول را بنویسیم',
        description: 'کلید سوالات متداول معنادار در قالب سوالات آن دقیقاً همانطور که کاربران از آنها می پرسند نهفته است. بنابراین ، در اینجا 3 هک نوشتن سوال عملی برای جلوگیری از سرقت اثربخشی سوالات متداول در سوالات ضعیف آورده شده است.'
    },
    {
        title:'سوالات متداول چیست؟',
        description: 'پرتکرارترین سوالات مربوط به هر صفحه گلچین می‌شود و در قالب سوالات متداول یا همان frequently asked questions به صفحه اضافه می‌شود. متخصصان معمولا این پرسش و پاسخ‌ها را با طرز کار توییتر مشابه می‌دانند و بخش مهمی از استرکچر دیتا را تشکیل می‌دهند.'
    },
]

const comments = [
    {
        title: '',
        description: 'دوره‌ی مدیریت پروژه‌ای که اخیراً گذراندم، بسیار مفید و کاربردی بود. محتوای دوره به‌خوبی ساختاربندی شده و شامل مباحث اساسی و پیشرفته مدیریت پروژه است. همچنین، تدریس استاد با تجربه و ارائه مثال‌های واقعی از پروژه‌های موفق، باعث شد که به‌راحتی مفاهیم را درک کنم و توانایی‌های مدیریتی‌ام را تقویت کنم.',
        user_name: 'علی رضایی'
    },
    {
        title: '',
        description: 'دوره‌ی برنامه‌نویسی وب به‌طور کلی تجربه‌ای بسیار آموزنده بود. در این دوره، با تکنولوژی‌های روز دنیا آشنا شدم و توانستم پروژه‌های عملی زیادی انجام دهم. استاد دوره با ارائه تمرینات عملی و حل مشکلات واقعی، یادگیری را جذاب و کاربردی کرده بود. همچنین، محیط آموزشی بسیار دوستانه و حمایتی بود.',
        user_name: 'رضا رفیعی'
    },
    {
        title: '',
        description: 'دوره‌ی تحلیل داده‌ها که اخیراً به پایان رساندم، به‌طور جامع به تحلیل داده‌های پیچیده پرداخت و ابزارهای مختلفی را برای تجزیه و تحلیل داده‌ها معرفی کرد. مطالب آموزشی به‌خوبی سازمان‌دهی شده بود و تدریس با استفاده از داده‌های واقعی و کاربردی، باعث شد که بتوانم مهارت‌های تحلیلی‌ام را به‌طور قابل توجهی افزایش دهم.',
        user_name: 'آرش میری'
    },
]


const Product = () =>{
    const sectionRefs = useRef({
        intro: null,
        syllabus: null,
        prerequisites: null,
        instructor: null,
        faq: null
    });
    const [newComment, setNewComment] = useState('');
    const [selectedTitle, setSelectedTitle] = useState(null);
    const [token, setToken] = useState(null);
    const { create } = useAPI();

    useEffect(()=>{
        const temp_token = localStorage.getItem("token");
        if(temp_token){
            setToken(temp_token)
        }
    },[])
    // useEffect(()=>{
    //     console.log('newComment :: ',newComment);
    // },[newComment])

    const scrollToSection = (section) => {
        const element = sectionRefs.current[section];
        if (element) {
            const headerOffset = 15 * window.innerHeight / 100; // Calculate 10vh in pixels
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    };
    const toggleDescription = (index) => {
        setSelectedTitle(selectedTitle === index ? null : index);
      };

    const saveComment = () =>{
        if (newComment && newComment!='')
            create('comments', newComment);
    }
    return (
        <>
            <CContainer className='product-page border border-5 border-secondary rounded-3 mb-5'>
                <CRow className='product-box d-flex justify-content-center flex-nowrap'>
                    <CCol md={4} className='d-none d-md-inline align-content-center'>
                        <img className='product-img' src={react1}/>
                    </CCol>
                    <CCol md={1} className='d-none d-md-inline align-content-center'>
                    </CCol>

                    <CCol md={7} className='align-content-center pe-5 mb-4'>
                        <h1>{'<< ' + ProductData.title}</h1>
                        <p>{ProductData.description}</p>
                        <CRow className='d-flex justify-content-around mb-4'>
                            <CCol md={5}>
                                <li>مدرس : {ProductData.teacher}</li>
                                <li>مدت زمان دوره : {ProductData.duriation + ' ساعت'}</li>
                                <li>شیوه برگزاری : {(ProductData.method === 'present') ? 'حضوری' : 'غیرحضوری'}</li>
                            </CCol>
                            <CCol className='d-none d-md-inline' md={2}></CCol>
                            <CCol md={5} className='align-content-center text-center'>
                                <h3>{ ProductData.price + '  تومان'}</h3>
                            </CCol>
                        </CRow>
                        <CRow>
                            <CButton className='p-3' color='secondary' shape='rounded-pill'>ثبت نام</CButton>
                        </CRow>
                    </CCol>
                </CRow>
            </CContainer>
            <CContainer className='mb-5'>
                <CRow className='d-flex flex-column-reverse flex-lg-row align-content-center'>
                    <CCol md={9} className='mx-auto'>
                        <CContainer className='product-text border border-secondary border-5 rounded-3 bg-light pt-3 pb-3'>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3 ref={el => sectionRefs.current.intro = el}><CIcon size='xl' className="me-2" icon={cisEducation}/> معرفی دوره </h3>
                                </div>
                                <p>{ProductData.intro}</p>
                            </div>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3 ref={el => sectionRefs.current.syllabus = el}><CIcon size='xl' className="me-2" icon={cisEducation}/> سرفصل های پکیج</h3>
                                </div>
                                {ProductData.headlines.map((headline,index)=>(
                                    <li key={index}>{headline}</li>
                                ))}

                            </div>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3 ><CIcon size='xl' className="me-2" icon={cisEducation}/> معرفی دوره </h3>
                                </div>
                                <p>{ProductData.intro}</p>
                            </div>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3><CIcon size='xl' className="me-2" icon={cisEducation}/> این دوره مناسب کدام گروه از هنرجویان است؟</h3>
                                </div>
                                <p>تمامی هنرجویانی که علاقمند به آموزش و یادگیری نقاشیخط هستند میتوانند از این دوره آموزشی استفاده کنند
زمینه سازی ، طراحی حروف وکلمات ، قلمگیری و سه بعدی سازی خطوط ( سایه زدن ) مواردی هستند که هنرجویان در این دوره آموزشی فرامیگیرند
این دوره همچنین برای هنرجویانی که تسلط کامل به هنر خوشنویسی دارند ویا هنر جویانی که از نرم افزار های خطاطی استفاده می کنند بسیار مناسب است چون براحتی میتوانند آثار فاخر وبا ارزشی را خلق کنند .</p>
                            </div>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3 ref={el => sectionRefs.current.instructor = el}><CIcon size='xl' className="me-2" icon={cisEducation}/> مدرس دوره </h3>
                                </div>
                                <div className="d-flex flex-column justify-content-around flex-md-row border border-3 border-secondary rounded-3 mb-5 p-3">
                                    <div>
                                        <div className="ms-3">
                                            <li>فارغ التحصیل انجمن خوشنویسان ایران</li>
                                            <li>اساتید : استاد جهانگیر کوچک زاده ،
                                            استاد عبدالله فرادی ، استاد یدالله کابلی و استاد کیخسرو خروش</li>
                                            <li>برپائی نمایشگاه انفرادی در ایران و اروپا</li>
                                            <li>شرکت در نمایشگاههای گروهی</li>
                                            <li>تدریس در دانشگاه</li>
                                        </div>
                                    </div>
                                    <div className='d-flex align-items-center'>
                                        <img className='mx-auto' src={react1} height={'300rem'}/>
                                    </div>
                                </div>
                            </div>
                            <div className='mb-5'>
                                <div className='header-with-line mb-3'>
                                    <h3 ref={el => sectionRefs.current.faq = el}><CIcon size='xl' className="me-2" icon={cisEducation}/> سوالات متداول  </h3>
                                </div>
                                <div>
                                    {faq.map((item, index) => (
                                        <div key={index} className='m-2'>
                                        <li
                                            onClick={() => toggleDescription(index)}
                                            style={{ cursor: 'pointer'}}
                                        >
                                            {item.title}
                                        </li>
                                        <br/>
                                        {selectedTitle === index && (
                                            <p className='ps-5' style={{ paddingLeft: '20px', color: 'gray' }}>{item.description}</p>
                                        )}

                                        </div>

                                    ))}
                                </div>
                            </div>

                        </CContainer>
                    </CCol>
                    <CCol  lg={3} className='mx-auto'>
                <CContainer className='sticky-container border border-secondary border-5 rounded-3 bg-light mb-5'>
                    <h3>دسترسی سریع</h3>
                    <CButton color='dark' className='w-100 text-start mb-4' onClick={() => scrollToSection('intro')}>
                        <li>معرفی دوره</li>
                    </CButton>
                    <CButton color='dark' className='w-100 text-start mb-4' onClick={() => scrollToSection('syllabus')}>
                        <li>سرفصل های پکیج</li>
                    </CButton>
                    {/* <CButton color='dark' className='w-100 text-start mb-4' onClick={() => scrollToSection('prerequisites')}>
                        <li>پیش نیاز دوره</li>
                    </CButton> */}
                    <CButton color='dark' className='w-100 text-start mb-4' onClick={() => scrollToSection('instructor')}>
                        <li>مدرس</li>
                    </CButton>
                    <CButton color='dark' className='w-100 text-start mb-4' onClick={() => scrollToSection('faq')}>
                        <li>سوالات متداول</li>
                    </CButton>
                </CContainer>
            </CCol>
                </CRow>
            </CContainer>
            <CContainer className='mb-5 '>
                <CRow className='d-flex flex-column-reverse flex-lg-row align-content-center ps-5'>
                    <CCol md={8}>
                        {comments.map((comment, index)=>(
                            <div key={index} className='mx-auto mb-3'>
                            <CRow className='border border-secondary border-1 rounded-3 p-2'>
                                <h3 key={index}>{comment.user_name} :</h3>
                                <CCol md={12}>
                                <p key={index}>{comment.description}</p>
                                </CCol>
                            </CRow>
                            </div>
                        ))}
                    </CCol>
                    {token ? (
                        <CCol className='border border-secondary border-1 rounded-3 p-2' md={8}>
                                <textarea value={newComment} className='form-control mb-3' onChange={(e) => setNewComment(e.target.value)}/>
                                <div className='d-flex flex-column flex-lg-row justify-content-center gap-5'>
                                    <CButton className='w-25' color='success' shape='rounded-pill' onClick={saveComment}>ثبت</CButton>
                                    <CButton className='w-25' color='danger' shape='rounded-pill'>انصراف</CButton>
                                </div>
                        </CCol>
                    ):(
                        <CCol className='border border-secondary border-1 rounded-3 p-2' md={8}>
                            <h5 className='text-center'>برای ثبت نظر ابتدا وارد شوید</h5>
                        </CCol>
                    )}
                </CRow>
            </CContainer>
        </>
    )
}

export default Product;
