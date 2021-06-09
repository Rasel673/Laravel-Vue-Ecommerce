<template>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>
  <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: {{date}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{shipping.name}}</strong><br>
                    {{shipping.address}}<br>
                    
                    Phone: (+88){{shipping.phone}}<br>
                    Email: {{shipping.email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{orderDetails.id}}</b><br>
                  <br>
                  <b>Order ID:</b>#{{orderDetails.id}}<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in orderDetails.order_item" :key="item.id">
                      <td>{{item.item_qty}}</td>
                      <td>{{item.item_name}}</td>
                      <td>${{item.item_price}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  {{orderDetails.payment_type}}
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Order Date:{{orderDetails.created_at}}</p>
                  <div class="table-responsive">
                    <table class="table">
                        <tbody>
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>${{orderDetails.subtotal}}</td>
                      </tr>
                      
                       <tr v-if="orderDetails>0">
                        <th>Tax (0%)</th>
                        <td>${{orderDetails.charge}}</td>
                      </tr>
                      
                      <tr>
                        <th>Total:</th>
                        <td>${{orderDetails.total}}</td>
                      </tr> 
                        </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a @click.prevent="print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</template>
<script>
export default{
    data(){
       return{
     orderDetails:{},
     shipping:{},
     date:'',
       }
    },
    mounted(){
     this.order();
     this.getDate();
    },
    methods:{
     order(){
         let id=this.$route.params.id;
         axios.get('/orders/'+id).then(response=>{
           this.orderDetails=response.data;
           this.shipping=JSON.parse(response.data.shipping_address);
         }).catch(error=>{

         });
     },
     print(){
       window.print();
     },
     getDate(){
    var today = new Date();
var dd = today.getDate();

var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;

today = dd+'-'+mm+'-'+yyyy;
this.date=today;


     }
    },



    }
}
</script>