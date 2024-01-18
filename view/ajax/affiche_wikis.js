

let filteredProducts = []; 

limit = 4;
      

function paginateFun(number_page) {
  const tableElement = document.getElementById("data");



  tableElement.innerHTML = "";

  const start = (number_page - 1) * limit;
  const end = number_page * limit;

let AllData;

if (Array.isArray(filteredProducts.data) && filteredProducts.data.length > 0) {
    AllData = filteredProducts.data;
} else if (Array.isArray(filteredProducts) && filteredProducts.length > 0) {
    AllData = filteredProducts;
} else {
    AllData = []; 
}


  const paginate_items = AllData.slice(start, end).map((elem) => {
    return `               <div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-body ps-0">
        <img src="${elem.image}" class="card-img-top" alt="Default Image">
            <h5 class="fw-bold">${elem.titre}</h5>
            <p class="fw-bold">${elem.contenu}</p>
            <!-- Append the category ID as a query parameter to the URL -->
            <a href="singlewiki.php?wiki_id=${elem.wiki_id}" class="fw-bold">Explore</a>
        </div>
    </div>
</div>

 `;
  });
  console.log(elem);

  tableElement.innerHTML = paginate_items.join("");
  // <a class="page-link " data-page="${elem + 1}" onclick="paginateFun(${elem + 1})" href="#goo">${elem + 1}</a>


  const buttons = [...Array(Math.ceil(AllData.length / limit)).keys()].map((elem) => {
    return `<li class="page-item">
      <button class="page-link " data-page="${elem + 1}" onclick="paginateFun(${elem + 1})">${elem + 1}</button>
    </li>`;
  });

  document.getElementById("paginate").innerHTML = buttons.join("");

  const buttone = document.querySelectorAll('.page-link');
  buttone.forEach(button => {
    button.classList.remove('active');
  });

  const activeButton = document.querySelector(`.page-link[data-page="${number_page}"]`);
  if (activeButton) {
    activeButton.classList.add('active');
  }
}

function fetchData(keyword) {
  var xhr = new XMLHttpRequest();
  xhr.open('get', "ajax/affiche_wiki.php?keyword=" + keyword, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {


      const data = JSON.parse(xhr.responseText);
      // const data = xhr.responseText;
      // console.log(xhr.responseText);

      // Update filteredProducts with fetched data
    filteredProducts = data;
    console.log(filteredProducts) ;


    paginateFun(1); // Call paginateFun after fetching data
    } else {
      console.error('Request failed with status ' + xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error('Request failed');
  };

  xhr.send();
}

fetchData("")

    const keywordInput = document.getElementById('keywordInput');

keywordInput.addEventListener('input', function() {
  const keywor = this.value.trim();
 
  
  fetchData(keywor) ;
});




  console.log("object");



  
