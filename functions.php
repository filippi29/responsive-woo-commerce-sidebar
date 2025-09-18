// Woocommerce sidebar reposition
add_action('woocommerce_after_main_content', 'mobile_sidebar',15);

function mobile_sidebar(){

    if(is_shop()){
    echo'<script>

    let sidebar = document.getElementById("secondary");
    
    function checkWidth(){
        let width = window.innerWidth;
        if (width<982){
            sidebar.style="display:none";
        }else{
            sidebar.style="display:block";
        }
    }

    checkWidth();

    window.addEventListener("resize", checkWidth);
    
    </script>';
    }else {echo '';}
}

add_action('woocommerce_before_main_content', 'show_filters',15);

function show_filters(){

        if(is_shop()){
            echo '
            <button id="filterButton">Φίλτρα Αναζήτησης</button>
            
            <script>
    
                let filterButton = document.getElementById("filterButton");
                let sidebars = document.getElementById("secondary");
                
                filterButton.addEventListener("click", showFilters);
                let i = 1;
                
                function showFilters(){
                    event.preventDefault();
                    if(i%2===0){
                      sidebars.style="display:block"; 
                      i++;
                    }else{
                     sidebars.style="display:none";
                     i++;
                    }
                }
            </script>';
        }
}
