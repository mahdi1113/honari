import pic from "../../assets/images/react.jpg";
import PackageImage from "../../components/PackageImage";
import redbook from "../../assets/images/redbook.jpg";
import openbook from "../../assets/images/openbook.jpg";
import CoursePackageCard from "../../components/CoursePackageCard";
const packages = [
    {
        title: "دوره خطاطی",
        image: redbook,
        link: "#/product/1",
    },
    {
        title: "دوره خطاطی",
        image: openbook,
        link: "#/product/2",
    },
    {
        title: "دوره خطاطی",
        image: redbook,
        link: "#/product/3",
    },
];

const Products = () => {
    return (
        <>
            <div className="mb-5">
                <h1 className="text-center mb-5">دوره های آموزشی</h1>
                <div className="d-flex flex-column flex-wrap flex-lg-row justify-content-lg-between align-items-center">
                    {packages.map((coursePackage, index) => (
                        <div className="mt-4">
                            <CoursePackageCard
                                ImgSrc={coursePackage.image}
                                Title={coursePackage.title}
                                link={coursePackage.link}
                            />
                        </div>
                    ))}
                </div>
            </div>
        </>
    );
};

export default Products;
