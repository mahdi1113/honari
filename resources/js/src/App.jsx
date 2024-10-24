import React, { Suspense, useEffect } from 'react';
import { HashRouter, Route, Routes, useLocation, useNavigate } from 'react-router-dom';
import './scss/style.scss';
import ScrollToTop from "./Tools/ScrollToTop";
import Swal from 'sweetalert2';
import { useDispatch, useSelector } from 'react-redux';

// Containers
const DefaultLayout = React.lazy(() => import('./layout/DefaultLayout'));

// Pages
const Login = React.lazy(() => import('./views/pages/login/Login'));
const Register = React.lazy(() => import('./views/pages/register/Register'));
const Page404 = React.lazy(() => import('./views/pages/page404/Page404'));
const Page500 = React.lazy(() => import('./views/pages/page500/Page500'));
const AdminDefaultLayout = React.lazy(() => import('./Admin/layout/DefaultLayout'));
const UserDefaultLayout = React.lazy(() => import('./User/layout/DefaultLayout'));
const SiteDefaultLayout = React.lazy(() => import('./Site/layout/DefaultLayout'));
const UserLogin = React.lazy(() => import('./User/Pages/Login/Login'))
const UserRegister = React.lazy(() => import('./User/Pages/Register/Register'))


const MainApp = () => {
  const loading = useSelector((state) => state.loading);

//   useEffect(() => {
//     if (loading) {
//       Swal.fire({
//         title: 'درحال پردازش ...',
//         allowOutsideClick: false,
//         allowEscapeKey: false,
//         showConfirmButton: false,
//         didOpen: () => {
//           Swal.showLoading();
//         },
//       });
//     } else {
//       Swal.close();
//     }
//   }, [loading]);


  return (
    <Suspense>
      <Routes>
        <Route exact path="/register" name="Register Page" element={<Register />} />
        <Route exact path="/404" name="Page 404" element={<Page404 />} />
        <Route exact path="/500" name="Page 500" element={<Page500 />} />
        <Route path="/admin/*" name="admin" element={<AdminDefaultLayout />} />
        <Route path="/userlogin" name="UserLogin" element={<UserLogin />} />
        <Route path="/userregister" name="UserRegister" element={<UserRegister />} />
        {/* <Route path="/adminlogin" name="AdminLogin" element={<AdminLogin />} />
        <Route path="/adminregister" name="AdminRegister" element={<AdminRegister />} /> */}
        <Route path="/user/*" name="user" element={<UserDefaultLayout />} />
        <Route path="/*" name="Home" element={<SiteDefaultLayout />} />
      </Routes>
    </Suspense>
  );
};

const App = () => {
  return (
    <HashRouter>
      <ScrollToTop />
      <MainApp />
    </HashRouter>
  );
};

export default App;
