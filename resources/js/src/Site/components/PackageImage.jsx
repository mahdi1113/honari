


const PackageImage = (ImgSrc, Title, link='#' ,color=null) => {
    console.log(ImgSrc);
    return (
        <a href={ImgSrc.link} className="package-image-link">
            <div className="package-image-container d-flex justify-content-center">
                <img src={ImgSrc.ImgSrc} alt={ImgSrc.Title} className="package-image img-fluid"/>
                {/* <div className="PackageImageText text-dark mx-auto">{ImgSrc.Title}</div> */}
                <div className="PackageImageText text-white image-overlay">
                    <p className="image-text">{ImgSrc.Title}</p>
                </div>
            </div>
        </a>
    )
}

export default PackageImage;
