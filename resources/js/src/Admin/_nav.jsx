import React from 'react'
import CIcon from '@coreui/icons-react'
import {
    cilBeachAccess,
    cilBell,
  cilDescription,
  cilDrop,
  cilPencil,
  cilPuzzle,
  cilSpeedometer,
  cilUser,
} from '@coreui/icons'
import { CNavGroup, CNavItem, CNavTitle } from '@coreui/react'
import { cidBook, cidContact, cilChalkboardTeacher, cilCursor, cilPeople, cilPerson, cilRoom, cilScreenDesktop, cisCloudDownload } from '@coreui/icons-pro'

const _nav = [
    {
        component: CNavItem,
        name: 'داشبورد',
        to: '/admin/',
        icon: <CIcon icon={cilScreenDesktop} customClassName="nav-icon text-danger" />,
        // badge: {
        //   color: 'info',
        //   text: 'NEW',
        // },
      },
    {
    component: CNavGroup,
    name: 'مدیریت کاربران',
    icon: <CIcon icon={cilUser} customClassName="nav-icon text-info" />,
    items: [
        // {
        //     component: CNavItem,
        //     name: 'اساتید',
        //     to: 'Teachers',
        //     iconitem: <CIcon icon={cilChalkboardTeacher} customClassName="nav-icon text-success" />
        //     },
            {
            component: CNavItem,
            name: 'کاربران',
            to: '/admin/Users',
            iconitem: <CIcon icon={cilUser} customClassName="nav-icon text-info" />
        },
    ],
    },
  {
    component: CNavItem,
    name: 'دوره ها',
    to: '/admin/Courses',
    icon: <CIcon icon={cilScreenDesktop} customClassName="nav-icon text-danger" />,
  },
  {
    component: CNavItem,
    name: "تیکت ها",
    to: "/admin/Tickets",
    icon: <CIcon icon={cilBeachAccess} customClassName="nav-icon text-success" />,
  },
  {
    component: CNavItem,
    name: "کامنت ها",
    to: "#",
    icon: <CIcon icon={cilPeople} customClassName="nav-icon text-info" />,
  },
  {
    component: CNavItem,
    name: "مقاله ها",
    to: "/admin/Blogs",
    icon: <CIcon icon={cilPeople} customClassName="nav-icon text-info" />,
  },

]

export default _nav
