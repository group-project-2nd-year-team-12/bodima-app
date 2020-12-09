<div class="payment-slide">
              <ul>
                  <li onclick="window.location='../index.php'"><i class="fas fa-external-link-alt"></i> Home page</li>
                  <li id="order" onclick="window.location='../controller/orderConFood.php?id=1'"><i class="fas fa-sort-amount-down-alt"></i> New Orders</li>
                  <li id="card-pay" onclick="window.location='../controller/orderConFood.php?id=2'"><i  class="far fa-credit-card"></i> Card Payment</li>
                  <li id="deliver" onclick="window.location='../controller/orderConFood.php?id=3'"><i class="fas fa-truck"></i> Delivering Orders</li>
                  <li id="history" onclick="window.location='../controller/orderConFood.php?id=4'"><i class="fas fa-history"></i> Deliverd History</li>
                  <li onclick="window.location='../controller/orderConFood.php?id=5'" ><i class="fas fa-cog"></i> Settings</li>
                  <div class="taggle-box">
                      <h5>You have to issue get order or deliver order? You can disable the request some time period.</h5>
                    <div class="taggle">
                        <h4>Order : <span style="color: chartreuse;">Available</span></h4>
                        <form action="../controller/orderCon.php?avail" method="post">
                            <input onchange="if(confirm('Are you sure disable this service ?'))this.form.submit();" type="checkbox" name="isAvail" value="true"  checked>
                            <label for="" class="onbtn">On</label>
                            <label for="" class="ofbtn">Off</label>
                        </form>
                    </div>
                  </div>
                  <div class="line"></div>
                  <h3 class="line1">OR</h3>
                  
                  <div class="select-box">
                  <h5>Select date disable order request</h5>
                     <div class="date-block">
                        <input id="1" type="date">
                     </div>
                      </form>
                      <h6>@Bodima</h6>
                  </div>
              </ul>
          </div> 