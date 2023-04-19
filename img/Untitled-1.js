var categories = document.getElementsByClassName("category");

for (var i = 0; i < categories.length; i++) {
    categories[i].addEventListener("mouseover", function() {
        this.querySelector("img").style.transform = "scale(1.1)";
        this.querySelector("h3").style.bottom = "-40px";
    });
    categories[i].addEventListener("mouseout", function() {
        this.querySelector("img").style.transform = "scale(1)";
        this.querySelector("h3").style.bottom = "0";
    });
}


function topFunction() {
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }


function get_products()
{
    fetch("get_product.php")
    .then(function(response)
    {
        return response.json();
    })
    .then(function(data){
        console.log("MAIN DATA:"+data);
        storeData(data);
    });
    function storeData(x)
    {
        y = JSON.parse(JSON.stringify(x));
        console.log("Y:"+y);
    }
    
}

function show_products()
{
    
}


