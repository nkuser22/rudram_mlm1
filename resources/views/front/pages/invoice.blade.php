@include('front/pages/header');

<section class="theme-invoice-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 mx-auto my-3">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <div class="header-left">
                                <div class="upper-icon">
                                    <img src="assets/images/logo.svg" class="img-fluid" alt="">
                                </div>

                                <div class="header-address">
                                    <div class="address-left">
                                        <ul>
                                            <li>2345 Tail Ends Road,</li>
                                            <li>ORADELL, New Jersey</li>
                                            <li>NJ, 38740</li>
                                        </ul>
                                    </div>

                                    <div class="address-right">
                                        <ul>
                                            <li class="text-content"><span class="theme-color"> Issue Date :</span> 20
                                                March, 2022</li>
                                            <li class="text-content"><span class="theme-color"> Invoic no :</span>
                                                904679</li>
                                            <li class="text-content"><span class="theme-color"> Email :</span>
                                                User@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="header-right">
                                <h3>Invoice</h3>
                            </div>
                        </div>
                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="table table-product mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th=>
                                            <th class="text-start">Item detail</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Amout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-content">1</td>
                                            <td class="text-start">Meatigo Premium Goat Curry</td>
                                            <td class="text-content">25</td>
                                            <td class="text-content">$60.00</td>
                                            <td>$156.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-content">2</td>
                                            <td class="text-start">Dates Medjoul Premium...</td>
                                            <td class="text-content">17</td>
                                            <td class="text-content">$7.00</td>
                                            <td>$116.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-content">3</td>
                                            <td class="text-start">Good Life Walnut Kernels...</td>
                                            <td class="text-content">18</td>
                                            <td class="text-content">$10.00</td>
                                            <td>$144.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-content">4</td>
                                            <td class="text-start">Apple Red Premium Imported</td>
                                            <td class="text-content">60</td>
                                            <td class="text-content">$06.00</td>
                                            <td>$345.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-content">5</td>
                                            <td class="text-start">Apple Red Premium Imported</td>
                                            <td class="text-content">17</td>
                                            <td class="text-content">$7.00</td>
                                            <td>$116.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">GRAND TOTAL</td>
                                            <td>$325.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer">
                            <div class="button-group">
                                <ul>
                                    <li>
                                        <button class="btn theme-bg-color text-white rounded"
                                            onclick="window.print();">Export As PDF</button>
                                    </li>
                                    <li>
                                        <button class="btn text-white print-button rounded ms-2"
                                            onclick="window.print();">Print</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="support-box">
                                <ul>
                                    <li>
                                        <div class="support-detail">
                                            <div class="support-icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="support-content">
                                                <ul>
                                                    <li>+91 643-387-826</li>
                                                    <li>+91 643-387-826</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="support-detail">
                                            <div class="support-icon">
                                                <i class="fa-solid fa-earth-americas"></i>
                                            </div>
                                            <div class="support-content">
                                                <ul>
                                                    <li>support@fastkart.com</li>
                                                    <li>www.fastkart.com</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="support-detail">
                                            <div class="support-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="support-content">
                                                <ul>
                                                    <li>Fastkart Store</li>
                                                    <li>Store India-2768283</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






@include('front/pages/footer');