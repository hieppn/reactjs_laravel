import React, { Component } from 'react';
import Books from './Books';
import NewBooks from './NewBooks';
import logo from '../img/logo.jpg';
import Footer from './Footer';
class Home extends Component {
    render() {
        return (
            <div>
                <NewBooks/>
                <Books />
                <div className="about">
                    <center><h1>Chicken Book</h1></center>
                    <p>Mua sách online tại nhà sách trực tuyến ChickenBook.vn để được cập nhật nhanh nhất các tựa sách đủ thể loại với mức giảm 15 – 35% cùng nhiều ưu đãi, quà tặng kèm. Qua nhiều năm, không chỉ là địa chỉ tin cậy để bạn mua sách trực tuyến, ChickenBook còn có quà tặng, văn phòng phẩm, vật dụng gia đình,…với chất lượng đảm bảo, chủng loại đa dạng, chế độ bảo hành đầy đủ và giá cả hợp lý từ hàng trăm thương hiệu uy tín trong và ngoài nước. Đặc biệt, bạn có thể chọn những mẫu sổ tay handmade hay nhiều món quà tặng sinh nhật độc đáo chỉ có tại ChickenBook.vn.</p>
                    <p>Mua sách online tại ChickenBook, bạn được tận hưởng chính sách hỗ trợ miễn phí đổi trả hàng, giao hàng nhanh – tận nơi – miễn phí*, thanh toán linh hoạt - an toàn, đặc biệt giảm thêm trên giá bán khi sử dụng BBxu giúp bạn mua sách online giá 0đ!</p>
                    <p>Chỉ với 3 cú click chuột, chưa bao giờ trải nghiệm mua sách online lại dễ chịu và nhẹ nhàng như vậy. Còn chần chờ gì nữa, đặt mua ngay những tựa sách hay cùng hàng ngàn sản phẩm chất lượng khác tại ChickenBook.vn!</p>
                    <p><img src={logo} width={50} height={50} />
                        <h5>Phản hồi của khách hàng
                        </h5>
                        <i>Đừng bỏ lỡ những tin nhắn ưu đãi độc quyền dành riêng cho bạn</i>
                        <br />
                        <div className="in"><input /><input className="bt" type="button" value="Send" /></div>
                    </p>
                </div>
                <Footer className="footer" />

            </div>
        )
    }
}
export default Home;