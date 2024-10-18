import React, { useState } from "react";
import {
    AppContent,
    AppSidebar,
    AppFooter,
    AppHeader,
} from "../components/index";
import "./darkMode.css";

const DefaultLayout = () => {
    // حالت برای مدیریت روشن/تاریک بودن تم
    const [isDarkMode, setIsDarkMode] = useState(false);

    // تابع برای تغییر تم
    const toggleDarkMode = () => {
        setIsDarkMode(!isDarkMode);
    };

    return (
        <div>
            <div className="wrapper d-flex flex-column min-vh-100 bg-light">
                    <AppHeader
                        isDarkMode={isDarkMode}
                        toggleDarkMode={toggleDarkMode}
                    />
                <div
                    className={`${
                        isDarkMode ? "dark-mode" : ""
                    } pt-4`}
                >
                    <AppContent />
                </div>
                    <AppFooter isDarkMode={isDarkMode} />
            </div>
        </div>
    );
};

export default DefaultLayout;
