import React, { useEffect, useState } from "react";
import useAPI from "../../../Tools/API/useAPI";
import Pagination from "../../../Tools/Pagination/Pagination";
import { CButton } from "@coreui/react-pro";
import {
    CCard,
    CCardBody,
    CCardFooter,
    CCardImage,
    CCardText,
    CCardTitle,
    CCol,
    CRow,
} from "@coreui/react";
const Index = () => {
    const { fetchPaginate } = useAPI();
    const [data, setData] = useState([]);
    const [totalPages, setTotalPages] = useState(0);
    const [page, setPage] = useState(1);
    const [itemsPerPage, setItemsPerPage] = useState(20);

    useEffect(() => {
        fetchData();
    }, [page, itemsPerPage]);
    useEffect(() => {
        // console.log(data);
    }, [data]);

    const fetchData = (search = null) => {
        let url = "get-blogs";
        // console.log('url :: ',url);
        const params = { itemsPerPage, page };
        fetchPaginate(url, setData, params);
    };

    const getFirstWords = (text, wordLimit) => {
        if (!text) return "";
        return (
            text.split(" ").slice(0, wordLimit).join(" ") +
            (text.split(" ").length > wordLimit ? "..." : "")
        );
    };

    return (
        <>
            <CRow
                xs={{ cols: 1, gutter: 4 }}
                md={{ cols: 4 }}
            >
                {data?.data?.map((blog) => (
                    <CCol xs>
                        <CCard>
                            <CCardImage
                                orientation="top"
                                src={blog?.thumbnail}
                            />
                            <CCardBody>
                                <CCardTitle>{blog?.title}</CCardTitle>
                                <CCardText
                                    dangerouslySetInnerHTML={{
                                        __html: getFirstWords(
                                            blog?.description,
                                            40
                                        ),
                                    }}
                                ></CCardText>
                            </CCardBody>
                            <CCardFooter>
                                <CButton
                                    href={"#/Blogs/show/" + blog.id}
                                    color="primary"
                                >
                                    نمایش
                                </CButton>
                            </CCardFooter>
                        </CCard>
                    </CCol>
                ))}
            </CRow>

            <div className="mt-4">
                <Pagination data={data} setPage={setPage} />
            </div>
        </>
    );
};

export default Index;
