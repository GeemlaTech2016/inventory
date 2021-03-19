<?php
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($myRole == 'admin') {
    ?>
    <div class="banner-top">
        <span class="menu">MENU</span>
        <ul class="nav banner-nav">                                     
            <li class="dropdown1"><a href="home.php">Home</a></li>

            <li class="dropdown1"><a href="#">Setup</a>
                <ul class="dropdown2">

                    <li><a href="customers.php">Customers</a>
                        <!--                   <ul>
               <li><a href="addcustomers.php">Add Customers</a></li>
               <li><a href="customers.php">All Customers</a></li>
                   </ul>-->
                    </li>
                    <li><a href="employees.php">Employees</a>
                        <ul>
                            <li><a href="employees.php">Employees</a></li>
                            <li><a href="assignstaff.php">Assign Staff</a></li>
                        </ul></li>
                    <li><a href="vendors.php">Suppliers</a></li>
                    <li><a href="branches.php">Branches</a></li>
                    <li><a href="banks.php">Banks</a></li>
                </ul>
            </li>  
            <li class="dropdown1"><a href="">Stock Mgt</a>
                <ul class="dropdown2">
                    <li><a href="products.php">Products</a>
                        <ul>
                            <li><a href="products.php">Add Products</a></li>
                            <li><a href="allproducts.php">All Products</a></li>
                            <!-- <li><a href="setsinglekg.php">Set Price of KG</a></li>-->
                        </ul>
                    </li>
                    <li><a href="productcat.php">Product Details</a></li>
                    <li><a href="addstock.php">Stock</a>
                        <ul>
                            <li><a href="addstock.php">Add to Stock</a></li>
                            <li><a href="stockreport.php">All Stock</a></li>
                            <li><a href="stockbydate.php">Stock Report</a></li>
                        </ul></li>

                </ul>
            </li> 
            <li class="dropdown1"><a href="">Sales Mgt</a>
                <ul class="dropdown2">
                    <li><a href="ms.php">Make Sale</a></li>
                    <li><a href="salesbydate.php">Sales by Date</a></li>
                    <li><a href="productReport.php">Sales by Product</a></li>
                    <li><a href="salesbyprod.php">Sales by Category</a></li>
                    <li><a href="salesbystaff.php">Sales by Staff</a></li>
                    <li><a href="salesbystaff1.php">Staff Sale Summary</a></li>
                    <li><a href="salebycustomer2.php">Purchases by Dealers</a></li>
                    <li><a href="dailysalesreport.php">Daily Sales Report</a></li>
                    <li><a href="reversesale.php">Edit/Return Sale</a></li>
                    <li><a href="viewreturns.php">View Returns</a></li>
                    <li><a href="salesreport.php">Sales Graph</a></li>
                </ul>
            </li> 
            <li class="dropdown1"><a href="">Accounting</a>
                <ul class="dropdown2">
                    <li><a href="vault.php">Vault</a>
                        <ul>
                            <li><a href="vault.php">Vault</a></li>
                            <li><a href="vaultreport.php">Vault Report</a></li>
                        </ul></li>

                    <li><a href="expenses.php">Expenses</a>
                        <ul>
                            <li><a href="expensetype.php">Add Expense Type</a>
                            <li><a href="expenses.php">Expenses</a></li>
                            <li><a href="expreport.php">Expense Summary</a></li>
                            <li><a href="expreport1.php">Expense Report</a></li>
                        </ul></li>
                    <li><a href="debtors.php">Debtors</a>
                        <ul>
                            <li><a href="debtors.php">Debtors</a></li>
                            <li><a href="repaydebt.php">Pay Debt</a></li>
                            <li><a href="debtreport.php">Debt Summary</a></li>
                            <li><a href="debtreportsingle.php">Customer Debt Report</a></li>
                        </ul>
                    </li>
                    <li><a href="creditors.php">Creditors</a>
                        <ul>
                            <li><a href="creditors.php">Creditors</a></li>
                            <li><a href="repaycredit.php">Repay Credit</a></li>
                            <li><a href="creditreport.php">Credit Report</a></li>
                        </ul>
                    </li>
                    <li><a href="wastages.php">Wastages</a></li>			

                </ul>
            </li> 
            <li class="dropdown1"><a href="">Reports</a>
                <ul class="dropdown2">
                    <li><a href="balsheet.php">Statment of Account</a></li>
                    <li><a href="balancesheet.php">Balance Sheet</a></li>
                    <li><a href="profitloss_modified.php">Profit & Loss</a></li>
                    <li><a href="profitstatement.php">Profit Report</a></li>
                    <li><a href="profitsum.php">Profit Summary</a></li>
                    <li><a href="income_exp.php">Income & Expense</a></li>
                    <li><a href="allpurchases.php">All Purchases</a></li>
                    <!--<li><a href="sales_Reports.php">Payment History</a></li>-->
                    <li><a href="transhistory.php">Transaction Log</a></li>
                    <li><a href="stockvalue.php">Stock Value</a></li>
                </ul>
            </li>
            <li class="dropdown1"><a href="">Others</a>
                <ul class="dropdown2">

                    <li><a href="sendsms.php">SMS</a></li>
                    <li><a href="">Emails</a></li>
                    <li><a href="">Backup</a></li>
                </ul>
            </li>	

            <li class="dropdown1"><a href="out.php">Logout</a></li>  
        </ul>
        <script>
            $("span.menu").click(function () {
                $(" ul.nav").slideToggle("slow", function () {
                });
            });
        </script>
    </div>
    <?php
} elseif ($myRole == 'Sales') {
    ?>
    <div class="banner-top">
        <span class="menu">MENU</span>
        <ul class="nav banner-nav">                                     
            <li class="dropdown1"><a href="home.php">Home</a></li>

            <li class="dropdown1"><a href="">Sales Mgt</a>
                <ul class="dropdown2">
                    <li><a href="ms.php">Make Sale</a></li>
                    <li><a href="salesbydate.php">Sales by Date</a></li>
                </ul>
            </li> 

            <li><a href="expenses.php">Expenses</a>
                <ul>
                    <li><a href="expenses.php">Expenses</a></li>
                    <li><a href="expreport.php">Expense Summary</a></li>
                    <li><a href="expreport1.php">Expense Report</a></li>
                </ul></li>

            <li><a href="wastages.php">Wastages</a></li>			


            <li class="dropdown1"><a href="out.php">Logout</a></li>  
        </ul>
        <script>
            $("span.menu").click(function () {
                $(" ul.nav").slideToggle("slow", function () {
                });
            });
        </script>
    </div>
<?php } elseif ($myRole == 'developer') {
    ?>
    <div class="banner-top">
        <span class="menu">MENU</span>
        <ul class="nav banner-nav">                                     
            <li class="dropdown1"><a href="home.php">Home</a></li>

            <li class="dropdown1"><a href="#">Setup</a>
                <ul class="dropdown2">

                    <li><a href="customers.php">Customers</a>
                        <!--                   <ul>
               <li><a href="addcustomers.php">Add Customers</a></li>
               <li><a href="customers.php">All Customers</a></li>
                   </ul>-->
                    </li>
                    <li><a href="employees.php">Employees</a></li>
                    <li><a href="vendors.php">Vendors</a></li>
                    <li><a href="branches.php">Branches</a></li>
                    <li><a href="adduser.php">Add Admin</a></li>
                    <li><a href="lockserver.php">Lock Server</a></li>
                </ul>
            </li>  
            <li class="dropdown1"><a href="">Stock Mgt</a>
                <ul class="dropdown2">
                    <li><a href="products.php">Products</a>
                        <ul>
                            <li><a href="products.php">Add Products</a></li>
                            <li><a href="allproducts.php">All Products</a></li>
                            <li><a href="setsinglekg.php">Set Price of KG</a></li>
                        </ul>
                    </li>
                    <li><a href="productcat.php">Product Details</a></li>
                    <li><a href="addstock.php">Stock</a>
                        <ul>
                            <li><a href="addstock.php">Add to Stock</a></li>
                            <li><a href="stockreport.php">All Stock</a></li>
                            <li><a href="stockbydate.php">Stock Report</a></li>
                        </ul></li>

                </ul>
            </li> 
            <li class="dropdown1"><a href="">Sales Mgt</a>
                <ul class="dropdown2">
                    <li><a href="ms.php">Make Sale</a></li>
                    <li><a href="salesbydate.php">Sales by Date</a></li>
                    <li><a href="salesbycat.php">Sales by Category</a></li>
                    <li><a href="salesbyprod.php">Sales by Product</a></li>
                </ul>
            </li> 
            <li class="dropdown1"><a href="">Accounting</a>
                <ul class="dropdown2">
                    <li><a href="vault.php">Vault</a>
                        <ul>
                            <li><a href="vault.php">Vault</a></li>
                            <li><a href="vaultreport.php">Vault Report</a></li>
                        </ul></li>
                    <li><a href="expenses.php">Expenses</a>
                        <ul>
                            <li><a href="expenses.php">Expenses</a></li>
                            <li><a href="expreport.php">Expense Report</a></li>
                        </ul></li>
                    <li><a href="debtors.php">Debtors</a>
                        <ul>
                            <li><a href="debtors.php">Debtors</a></li>
                            <li><a href="repaydebt.php">Repay Debt</a></li>
                            <li><a href="debtreport.php">Debt Report</a></li>
                        </ul>
                    </li>
                    <li><a href="wastages.php">Wastages</a></li>			

                </ul>
            </li> 
            <li class="dropdown1"><a href="">Reports</a>
                <ul class="dropdown2">
                    <li><a href="balsheet.php">Balance Sheet</a></li>
                    <li><a href="profitstatement.php">Profit Report</a></li>
                    <li><a href="income_exp.php">Income & Expense</a></li>
                    <li><a href="allpurchases.php">All Purchases</a></li>
                    <!--<li><a href="sales_Reports.php">Payment History</a></li>-->
                    <li><a href="transhistory.php">Transaction Log</a></li>
                    <li><a href="stockvalue.php">Stock Value</a></li>
                </ul>
            </li>
            <li class="dropdown1"><a href="">Others</a>
                <ul class="dropdown2">

                    <li><a href="">SMS</a></li>
                    <li><a href="">Emails</a></li>
                    <li><a href="">Backup</a></li>
                </ul>
            </li>	

            <li class="dropdown1"><a href="out.php">Logout</a></li>  
        </ul>
        <script>
            $("span.menu").click(function () {
                $(" ul.nav").slideToggle("slow", function () {
                });
            });
        </script>
    </div>
    <?php
} else {
    ?>
    <div class="banner-top">
        <span class="menu">MENU</span>
        <ul class="nav banner-nav">                                     
            <li class="dropdown1"><a href="index.php">Home</a></li>
            <li class="dropdown1"><a href="">About</a></li>     

            <li class="dropdown1"><a href="">Pricing </a></li> 
            <li class="dropdown1"><a href="">Help</a>	</li> 
            <li class="dropdown1"><a href="">Contact</a></li>  
        </ul>
        <script>
            $("span.menu").click(function () {
                $(" ul.nav").slideToggle("slow", function () {
                });
            });
        </script>
    </div>
    <?php
}
?>