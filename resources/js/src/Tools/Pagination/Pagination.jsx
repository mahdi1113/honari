import React from 'react';
import { CPagination, CPaginationItem } from '@coreui/react';

const Pagination = ({ data, setPage }) => {
    const { meta } = data;

    const currentPage = meta?.current_page;
    const lastPage = meta?.last_page;

    const getPageRange = (current, last, delta = 2) => {
        const range = [];
        const left = Math.max(2, current - delta); // Start from page 2 (because page 1 is always shown)
        const right = Math.min(last - 1, current + delta); // Exclude the last page (because it's always shown)

        for (let i = left; i <= right; i++) {
            range.push(i);
        }

        return range;
    };

    const pageRange = getPageRange(currentPage, lastPage);

    return (
        <CPagination align='center' aria-label="Page navigation example">
            {/* First page << */}
            <CPaginationItem
                disabled={currentPage === 1}
                onClick={() => setPage(1)}
            >
                &laquo;
            </CPaginationItem>

            {/* First page number (always visible) */}
            <CPaginationItem
                active={currentPage === 1}
                onClick={() => setPage(1)}
            >
                1
            </CPaginationItem>

            {/* Dots if there's a gap between first page and range */}
            {currentPage > 3 && (
                <CPaginationItem disabled>...</CPaginationItem>
            )}

            {/* Page range around the current page */}
            {pageRange.map((page) => (
                <CPaginationItem
                    key={page}
                    active={page === currentPage}
                    onClick={() => setPage(page)}
                >
                    {page}
                </CPaginationItem>
            ))}

            {/* Dots if there's a gap between range and last page */}
            {currentPage < lastPage - 2 && (
                <CPaginationItem disabled>...</CPaginationItem>
            )}

            {/* Last page number (always visible) */}
            {lastPage > 1 && (
                <CPaginationItem
                    active={currentPage === lastPage}
                    onClick={() => setPage(lastPage)}
                >
                    {lastPage}
                </CPaginationItem>
            )}

            {/* Last page >> */}
            <CPaginationItem
                disabled={currentPage === lastPage}
                onClick={() => setPage(lastPage)}
            >
                &raquo;
            </CPaginationItem>
        </CPagination>
    );
};

export default Pagination;
