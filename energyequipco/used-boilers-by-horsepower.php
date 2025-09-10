<?php include('inc/head.php');?>

<body id="bg">

<?php include('inc/header.php');?>


<div class="page-content bg-white">
		<!-- Banner  -->
		<div class="slidearea bannerside">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-envelope"></i> dave@energyequipco.com</li>
				</ul>
			</div>
			<div class="ic-bnr-inr ic-bnr-inr-sm style-1 overlay-black-light overlay-left" style="background-image: url(images/video/pic2-2.jpg);">
				<div class="container-fluid">
					<div class="ic-bnr-inr-entry">
						<h1>Hurst Boilers</h1>
						<!-- Breadcrumb Row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item">Hurst Boilers</li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Banner End -->


        <!-- Product Details  -->

    <section class="content-inner-2">
        <div class="container">
             <div class="action-links style-1 text-center m-b50 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                 <a href="#" class="action-link"><i class="fas fa-print"></i> Printable Page</a>
                 <a href="#" class="action-link"><i class="fas fa-file-pdf"></i> Download PDF</a>
                 <a href="#" class="action-link"><i class="fas fa-envelope"></i> Email This Page</a>
             </div> 
			 
			      <div class="row ">
				        <div class="col-lg-6 align-self-center aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <img src="images/product/hurst-boiler.jpeg" alt="">
				        </div>

				         <div class="col-lg-6 align-self-center aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
				            <p>Reconditioning the used Hurst Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A 1 year parts replacement warranty on controls is included.</p>

				            <p>Used, reconditioned Hurst Boilers, Hurst 3 & 4 pass dry back boilers, Hurst 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Hurst boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.</p>
				           </div>

				    </div>
        
        </div>

    </section>



   <!-- Product Details End -->


<section class="m-b50">
    <div class="container">
         <div class="list-header">
         <span>1 - 15 of 15</span>
         <div>
             <label for="perPage">Results Per Page</label>
             <select id="perPage">
             <option>25</option>
             <option>50</option>
             <option>75</option>
             <option>100</option>
             </select>
             <label>View</label>
             <span><a href="javascript:void(0);"><i class="fa fa-list-ul" aria-hidden="true"></i></a></span>
             <span><a href="javascript:void(0);"><i class="fa fa-th" aria-hidden="true"></i></a></span>
             
         </div>
    </div>

  <div class="actions">
    <button>Request Information</button>
    <button>Compare Items</button>
  </div>

   <table>
    <thead>
      <tr>
        <th>Item #</th>
        <th>Manufacturer</th>
        <th>Year Built</th>
        <th>Horsepower</th>
        <th>Steam or Hot Water</th>
        <th>Design Pressure</th>
        <th>Burner</th>
        <th>Fuel(s)</th>
      </tr>
    </thead>
    <tbody id="table-body"></tbody>
  </table>

  <div class="pagination">
    <button id="prevBtn" onclick="changePage(-1)">Previous</button>
    <button id="nextBtn" onclick="changePage(1)">Next</button>
  </div>

  <script>
    const data = [
      ["9920", "Hurst", 1996, "20 hp", "Steam", "150 psi", "PowerFlame", "natural gas"],
      ["9530", "Hurst", 1995, "30 hp", "Steam", "150 psi", "PowerFlame", "natural gas"],
      ["9130", "Superior", 1991, "30 hp", "Steam", "150 psi", "PowerFlame", "natural gas"],
      ["1930", "Fulton Skidded System", 2019, "30 hp", "Steam", "150 psi", "Fulton", "natural gas"],
      ["9360", "Cleaver Brooks", 1993, "60 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas"],
      ["0260", "Hurst", 2002, "60 hp", "Hot Water", "160 psi", "Webster", "natural gas"],
      ["9170", "York Shipley", 1991, "70 hp", "Steam", "150 psi", "Oilon", "natural gas"],
      ["9480", "Cleaver Brooks", 1994, "80 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas"],
      ["0080", "Cleaver Brooks", 2000, "80 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas"],
      ["95100", "Cleaver Brooks", 1995, "100 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["05100", "Hurst", 2005, "100 hp", "Hot Water", "160 psi", "PowerFlame", "natural gas"],
      ["98100", "Superior", 1998, "100 hp", "Steam", "150 psi", "Oilon", "natural gas/2 oil"],
      ["22100", "Williams & Davis (Never Installed)", 2022, "100 hp", "Steam", "150 psi", "PowerFlame", "natural gas"],
      ["95150", "Cleaver Brooks", 1995, "150 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas"],
      ["11150MBL", "Cleaver Brooks Mobile System", 2011, "150 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["01150", "Superior", 2001, "150 hp", "Steam", "150 psi", "Gordon Piatt", "natural gas"],
      ["11150YS", "York Shipley", 2011, "150 hp", "Steam", "150 psi", "Limpsfield", "natural gas"],
      ["86200", "Cleaver Brooks", 1986, "200 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["87200", "Cleaver Brooks", 1987, "200 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["88200", "Cleaver Brooks", 1988, "200 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["96200CB", "Cleaver Brooks", 1996, "200 hp", "Steam", "15 psi", "Cleaver Brooks", "natural gas"],
      ["97200CB", "Cleaver Brooks", 1997, "200 hp", "Steam", "150 psi", "Cleaver Brooks", "natural gas/2 oil"],
      ["97200YS", "York Shipley", 1997, "200 hp", "Steam", "150 psi", "York Shipley", "natural gas/2 oil"],
      ["96200", "Johnston", 1996, "200 hp", "Steam", "150 psi", "Industrial Combustion", "natural gas"],
      ["9960", "Hurst", 1999, "250 hp", "Steam", "150 psi", "PowerFlame", "natural gas"] // item 25
      // Add more items (up to 60) as needed here...
    ];

    let currentPage = 1;
    const rowsPerPage = 25;
    const tableBody = document.getElementById('table-body');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    function displayTable(page) {
      tableBody.innerHTML = '';
      let start = (page - 1) * rowsPerPage;
      let end = start + rowsPerPage;
      let paginatedItems = data.slice(start, end);

      for (let row of paginatedItems) {
        let tr = document.createElement('tr');
        row.forEach((cell, i) => {
          const td = document.createElement('td');
          td.innerHTML = (i === 0) ? `<a href="#">${cell}</a>` : cell;
          tr.appendChild(td);
        });
        tableBody.appendChild(tr);
      }

      prevBtn.disabled = page === 1;
      nextBtn.disabled = end >= data.length;
    }

    function changePage(direction) {
      currentPage += direction;
      displayTable(currentPage);
    }

    displayTable(currentPage);
  </script>

  </div>

</section>





<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>