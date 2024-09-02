import React from 'react'

const Home = React.lazy(() => import("./views/Home/Home"));
const AboutUs = React.lazy(() => import("./views/AboutUs/AboutUs"));
const Products = React.lazy(() => import("./views/Products/Products"));
const Product = React.lazy(() => import("./views/Product/Product"));

const routes = [
    {path: "/" , name: "Home" , element: Home},
    {path: "/Products" , name: "Products" , element: Products},
    {path: "/Product/:id" , name: "Product" , element: Product},
    {path: "/AboutUs" , name: "AboutUs" , element: AboutUs},

]

export default routes
