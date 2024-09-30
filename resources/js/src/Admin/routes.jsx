import React from 'react'

const Dashboard = React.lazy(() => import('./views/dashboard/Dashboard'))
const Login = React.lazy(() => import('./Pages/Login/Login'))
const Register = React.lazy(() => import('./Pages/Register/Register'))
const UsersIndex = React.lazy(() => import('./views/Users/Index'))
const UsersShow = React.lazy(() => import('./views/Users/Show'))
const UsersEdit = React.lazy(() => import('./views/Users/Edit'))
const CoursesIndex = React.lazy(() => import('./views/Courses/Index'))
const CoursesShow = React.lazy(() => import('./views/Courses/Show'))
const CoursesEdit = React.lazy(() => import('./views/Courses/Edit'))
const ItemsIndex = React.lazy(() => import('./views/Items/Index'))
const ItemsShow = React.lazy(() => import('./views/Items/Create'))
const ItemsEdit = React.lazy(() => import('./views/Items/Edit'))
const ItemsCreate = React.lazy(() => import('./views/Items/Create'))
// FQ short for FrequentlyQuestions
const FQIndex = React.lazy(() => import('./views/FrequentlyQuestions/Index'))
const FQShow = React.lazy(() => import('./views/FrequentlyQuestions/Create'))
const FQEdit = React.lazy(() => import('./views/FrequentlyQuestions/Edit'))
const FQCreate = React.lazy(() => import('./views/FrequentlyQuestions/Create'))
const TicketsIndex = React.lazy(() => import('./views/Tickets/Index'))
const TicketsEdit = React.lazy(() => import('./views/Tickets/Edit'))
const BlogIndex = React.lazy(() => import('./views/Blogs/index'))
const BlogCreate = React.lazy(() => import('./views/Blogs/Create'))
const BlogShow = React.lazy(() => import('./views/Blogs/Show'))
const BlogUpdate = React.lazy(() => import('./views/Blogs/Update'))

const routes = [
  { path: 'Dashboard', name: 'Dashboard', element: Dashboard },
  { path: 'Login', name: 'Login', element: Login },
  { path: 'Register', name: 'Register', element: Register },
  { path: 'Users', name: 'UsersIndex', element: UsersIndex },
  { path: 'Users/:id', name: 'UsersShow', element: UsersShow },
  { path: 'Users/:id/Edit', name: 'UsersEdit', element: UsersEdit },
  { path: 'Courses', name: 'CoursesIndex', element: CoursesIndex },
  { path: 'Courses/:id', name: 'CoursesShow', element: CoursesShow },
  { path: 'Courses/:id/Edit', name: 'CoursesEdit', element: CoursesEdit },
  { path: 'Courses/:id/Items', name: 'ItemsIndex', element: ItemsIndex },
  { path: 'Courses/:id/Items/:itemid', name: 'ItemsShow', element: ItemsShow },
  { path: 'Courses/:id/Items/:itemid/Edit', name: 'ItemsEdit', element: ItemsEdit },
  { path: 'Courses/:id/Items/Create', name: 'ItemsCreate', element: ItemsCreate },
  { path: 'Courses/:id/FQ', name: 'FQIndex', element: FQIndex },
  { path: 'Courses/:id/FQ/:fqid', name: 'FQShow', element: FQShow },
  { path: 'Courses/:id/FQ/:fqid/Edit', name: 'FQEdit', element: FQEdit },
  { path: 'Courses/:id/FQ/Create', name: 'FQCreate', element: FQCreate },
  { path: 'Tickets', name: 'TicketsIndex', element: TicketsIndex },
  { path: 'Tickets/:id/Edit', name: 'TicketsEdit', element: TicketsEdit },
  { path: 'Blogs', name: 'BlogIndex', element: BlogIndex },
  { path: 'Blogs/create', name: 'BlogCreate', element: BlogCreate },
  { path: 'Blogs/show/:id', name: 'BlogShow', element: BlogShow },
  { path: 'Blogs/Update', name: 'BlogUpdate', element: BlogUpdate },

]

export default routes
