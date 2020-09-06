import React, { Component } from 'react';
import '../css/Footer.css';
class Footer extends Component {
  render() {
    return (
      <div className="footer">
        <div className='footer-main'>
          <div className='footer-column'>
            <div className="item"> HỖ TRỢ KHÁCH HÀNG</div>
            <div className="item">Điện thoại: (+84) 981 536 770 (giờ hành chính)</div>
            <div className="item">Email: info@chickenbook.vn</div>
            <div className="item">Địa chỉ: 147 Pasteur, Phường 6, Quận 3, TP.HCM</div>
            <div className="item">Sơ đồ đường đi</div>
          </div>
          <div className='footer-column'>
              <div>
                TRỢ GIÚP<br />
                Đăng ký nhận bản tin<br />
                Hướng dẫn mua hàng<br />
                Phương thức thanh toán<br />
                Phương thức vận chuyển<br />
                Chính sách đổi - trả<br />
              </div>
          </div>
          < div className='footer-column'>
           TÀI KHOẢN CỦA BẠN<br/>
            Cập nhật tài khoản<br />
            Giỏ hàng<br />
            Lịch sử giao dịch<br />
            Sản phẩm yêu thích<br />
            Kiểm tra đơn hàng<br />
          </div>
        </div>
      </div>
    )
  }
}
export default Footer;