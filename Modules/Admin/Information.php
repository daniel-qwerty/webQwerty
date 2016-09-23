<?PHP

class Admin_Information extends Com_Module_Information {

    public function init() {
        
         $obj = get('userType');
         
               //Com_Helper_Menu::getInstance()->add("Home", "/Admin", get('User'), "home");
            
         
        if($obj == 1){
            // Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "fa-pie-chart");
       
        Com_Helper_Menu::getInstance()->add("Content", null, "Contenido", "th-large");
        Com_Helper_Menu::getInstance()->add("Menu", "/Admin/Menu", "Menu", "list-ol", "Content");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/Texts", "Textos", "text-width", "Content");
        Com_Helper_Menu::getInstance()->add("Pages", "/Admin/Pages", "P&aacute;ginas", "file", "Content");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "phone", "Content");
        Com_Helper_Menu::getInstance()->add("SlidesShows", "/Admin/SlideShows", "SlideShow", "picture-o", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "link", "Content");
        Com_Helper_Menu::getInstance()->add("Team", "/Admin/Team", "Equipo", "users", "Content");
        Com_Helper_Menu::getInstance()->add("Services", "/Admin/Services", "Servicios", "suitcase", "Content");
        Com_Helper_Menu::getInstance()->add("Customers", "/Admin/Customers", "Clientes", "user", "Content");
        Com_Helper_Menu::getInstance()->add("How", "/Admin/How", "Como lo hacemos", "wrench", "Content");
        
        /**
        *Menu Blog
        */
       
        Com_Helper_Menu::getInstance()->add("Blog", null, "Blog", "list-alt");
        Com_Helper_Menu::getInstance()->add("Categorias", "/Admin/Blog", "Categorias", "th-large", "Blog");
        Com_Helper_Menu::getInstance()->add("Articulos", "/Admin/Articles", "Articulos", "outdent", "Blog");
        Com_Helper_Menu::getInstance()->add("Articulos", "/Admin/Tags", "Tags", "tags", "Blog");
        
        /**
        *Menu Proyectos
        */
       
        Com_Helper_Menu::getInstance()->add("Proyectos", null, "Proyectos", "cubes");
        Com_Helper_Menu::getInstance()->add("Items", "/Admin/Projects", "Itmes", "tasks", "Proyectos");
        Com_Helper_Menu::getInstance()->add("Relaciones", "/Admin/Relations", "Relaciones", "compress", "Proyectos");
        
        
        
        /**
         * Menu Administracion
         */
        Com_Helper_Menu::getInstance()->add("Administration", null, "Administraci&oacute;n", "cog");
        Com_Helper_Menu::getInstance()->add("Users", "/Admin/Users", "Usuarios", "user", "Administration");
        Com_Helper_Menu::getInstance()->add("Languages", "/Admin/Language", "Idiomas", "language", "Administration");
        Com_Helper_Menu::getInstance()->add("Configurations", "/Admin/Configurations", "Configuracion", "wrench", "Administration");
        //Com_Helper_Menu::getInstance()->add("Events", "/Admin/Events", "Eventos", "events", "Content");
        //Com_Helper_Menu::getInstance()->add("News", "/Admin/News", "Noticias", "noticias", "Content");
        //Com_Helper_Menu::getInstance()->add("Gallery", "/Admin/Gallery", "Galeria", "Galeria", "Content");
        }
        
        if($obj == 2){
            // Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "fa-pie-chart");
       
        Com_Helper_Menu::getInstance()->add("Content", null, "Contenido", "th-large");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "phone", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "link", "Content");
        Com_Helper_Menu::getInstance()->add("Team", "/Admin/Team", "Equipo", "users", "Content");
        Com_Helper_Menu::getInstance()->add("Services", "/Admin/Services", "Servicios", "suitcase", "Content");
        Com_Helper_Menu::getInstance()->add("Customers", "/Admin/Customers", "Clientes", "user", "Content");
        
        
        /**
        *Menu Blog
        */
       
        Com_Helper_Menu::getInstance()->add("Blog", null, "Blog", "list-alt");
        Com_Helper_Menu::getInstance()->add("Categorias", "/Admin/Blog", "Categorias", "th-large", "Blog");
        Com_Helper_Menu::getInstance()->add("Articulos", "/Admin/Articles", "Articulos", "outdent", "Blog");
        Com_Helper_Menu::getInstance()->add("Articulos", "/Admin/Tags", "Tags", "tags", "Blog");
        
        /**
        *Menu Proyectos
        */
       
        Com_Helper_Menu::getInstance()->add("Proyectos", null, "Proyectos", "cubes");
        Com_Helper_Menu::getInstance()->add("Items", "/Admin/Projects", "Itmes", "tasks", "Proyectos");
        Com_Helper_Menu::getInstance()->add("Relaciones", "/Admin/Relations", "Relaciones", "compress", "Proyectos");
        
        }

       
        
        
        

        /**
         * Panel Items
         */
        Com_Helper_Panel::getInstance()->add("signal", "Estad&iacute;sticas", "/Admin/Statistics");
        Com_Helper_Panel::getInstance()->add("font", "Textos", "/Admin/Texts");
        Com_Helper_Panel::getInstance()->add("align-justify", "P&aacute;ginas", "/Admin/Pages");
        Com_Helper_Panel::getInstance()->add("file", "Noticias", "/Admin/News");
        Com_Helper_Panel::getInstance()->add("inbox", "Contacto", "/Admin/Contact");
        Com_Helper_Panel::getInstance()->add("picture", "SlideShows", "/Admin/SlideShows");
        Com_Helper_Panel::getInstance()->add("link", "Links", "/Admin/Links");
        Com_Helper_Panel::getInstance()->add("list-alt", "Menu", "/Admin/Menu");
        Com_Helper_Panel::getInstance()->add("globe", "Tags", "/Admin/Tags");
        Com_Helper_Panel::getInstance()->add("globe", "Blog", "/Admin/Blog");
        Com_Helper_Panel::getInstance()->add("globe", "Items Blog", "/Admin/BlogItem");
        Com_Helper_Panel::getInstance()->add("globe", "Servicios", "/Admin/Services");
        Com_Helper_Panel::getInstance()->add("globe", "Clientes", "/Admin/Customers");
        Com_Helper_Panel::getInstance()->add("globe", "Proyectos", "/Admin/Projects");
        Com_Helper_Panel::getInstance()->add("globe", "Como lo hacemos", "/Admin/How");
        Com_Helper_Panel::getInstance()->add("globe", "Equipo", "/Admin/Team");
    }

}
