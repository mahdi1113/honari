import React from 'react'

const Home = React.lazy(() => import("./views/Home/Home"));
const AboutUs = React.lazy(() => import("./views/AboutUs/AboutUs"));
const Products = React.lazy(() => import("./views/Products/Products"));
const Product = React.lazy(() => import("./views/Product/Product"));
const BlogIndex = React.lazy(() => import("./views/Blogs/index"));
const BlogShow = React.lazy(() => import("./views/Blogs/show"))

const routes = [
    {path: "/" , name: "Home" , element: Home},
    {path: "/Products" , name: "Products" , element: Products},
    {path: "/Product/:id" , name: "Product" , element: Product},
    {path: "/AboutUs" , name: "AboutUs" , element: AboutUs},
    {path: "/AboutUs" , name: "AboutUs" , element: AboutUs},
    { path: '/Blogs', name: 'BlogIndex', element: BlogIndex },
    { path: '/Blogs/show/:id', name: 'BlogShow', element: BlogShow },

]

export default routes
