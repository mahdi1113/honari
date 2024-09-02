import React from 'react'
import { CFooter } from '@coreui/react'
import { CNavItem, CNavLink } from '@coreui/react-pro'
import CIcon from '@coreui/icons-react'
import { cibInstagram } from '@coreui/icons-pro'
import pic from'../assets/images/logo1.jpg';
const AppFooter = () => {
  return (
    <CFooter>
      <div className='d-flex justify-content-around me-auto flex-grow-1'>

            <div>
                <img src='./images.jpg' width={'100'}/>
            </div>

            <div className='d-flex flex-column'>
                <p>دسترسی سریع</p>
                <h5>
                    <CNavLink href="#">صفحه نخست</CNavLink>
                </h5>
                <h5>
                    <CNavLink href="#">دوره های آموزشی</CNavLink>
                </h5>
            </div>
            <div className='d-flex flex-column'>
                <p>نماد های اعتماد</p>
                <img src={pic} width={'100rem'}/>
            </div>
            <div className='d-flex flex-column'>
                <p>با ما در ارتباط باشید</p>
                <h5>
                hello@mehrdadesfehaniyan.com

                </h5>
            </div>
            <div className='d-flex flex-column'>
                <p>ما را دنبال کن</p>
                <CIcon icon={cibInstagram} size="xl"/>
            </div>
      </div>

    </CFooter>

  )
}

export default React.memo(AppFooter)
