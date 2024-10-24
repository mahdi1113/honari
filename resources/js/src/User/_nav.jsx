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
    to: '/user/',
    icon: <CIcon icon={cilScreenDesktop} customClassName="nav-icon text-danger" />,
  },
  {
    component: CNavItem,
    name: "دوره های من",
    to: "/user/mycourses",
    icon: <CIcon icon={cilPencil} customClassName="nav-icon text-info" />,
  },
  {
    component: CNavItem,
    name: "سوال های من",
    to: "/user/mytickets",
    icon: <CIcon icon={cilPuzzle} customClassName="nav-icon text-warning" />,
  },
  {
    component: CNavItem,
    name: "لیست تراکنش ها",
    to: "/user/mytickets",
    icon: <CIcon icon={cilDescription} customClassName="nav-icon text-success" />,
  },

]

export default _nav
