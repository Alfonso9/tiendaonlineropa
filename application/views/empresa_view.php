<?php $this->load->view('head/librerias_view'); ?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>

<div class="row">
    <!--Nav Bar -->
    <nav class="col-xs-3 bs-docs-sidebar">
        <ul id="sidebar" class="nav nav-stacked fixed">
        	<h1>Empresa  /</h1>
            <li>
                <a href="#GroupA">QUIENES SOMOS</a>
                <ul class="nav nav-stacked">
                    <li><a href="#GroupASub1">Concepto</a></li>
                    <li><a href="#GroupASub2">Historia</a></li>
                    <li><a href="#GroupASub3">Colecciones</a></li>
                    <li><a href="#GroupASub4">Cifras</a></li>
                    <li><a href="#GroupASub5">Grupo T-shirt & Staff</a></li>
                </ul>
            </li>
            <li>
                <a href="#GroupB">OFICINAS</a>
            </li>
            <li>
                <a href="#GroupC">TIENDAS</a>
            </li>
            <li>
                <a href="#GroupD">TRABAJA CON NOSOTROS</a>
            </li>
            <li>
                <a href="#GroupE">FRANQUICIAS</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
    <div class="col-xs-5">
        <section id="GroupA" class="group">
            <h2>Quienes somos</h2>
            <div id="GroupASub1" class="subgroup">
                <h4>Concepto</h4>
                <p>
                	T-shirt & Staff arranca en el año 1991 con clara vocación internacional y con la intención de vestir a jóvenes comprometidos con su entorno, que viven en comunidad y se relacionan entre sí. Jóvenes que visten de forma relajada, huyendo de los estereotipos y que quieren sentirse bien con lo que llevan. Para ellos T-shirt & Staff recoge las últimas tendencias internacionales, las mezcla con las influencias que marca la calle y los clubs de moda, y las reinterpreta a su estilo para transformarlas en prendas cómodas y fáciles de llevar, siempre al mejor precio.<br><br>
					T-shirt & Staff evoluciona de forma paralela a su cliente, siempre atento a las nuevas tecnologías, los movimientos sociales y las últimas tendencias artísticas o musicales. Todo ello se ve reflejado ya no sólo en sus diseños, sino también en las tiendas. Inspirada en la mítica ciudad californiana de Palm Springs, la renovación de la oferta es constante. Dos veces por semana todas las tiendas del mundo reciben nueva mercancía.<br><br>
					Perteneciente al Grupo Inditex (Zara, T-shirt & Staff, Massimo Dutti, Bershka, Stradivarius, Oysho, Zara Home y Uterqüe), T-shirt & Staff está presente en 70 mercados (65 con tiendas físicas y 5 a través exclusivamente de Internet) con una red de 900 tiendas.
                </p>
            </div>
            <div id="GroupASub2" class="subgroup">
                <h4>Historia</h4>
                <p>
                	<h4>1991</h4>
                	Nace la cadena de tiendas de moda T-shirt & Staff, fruto de una estrategia de segmentación de mercados iniciada por el Grupo Inditex. Es en este momento cuando el hombre demanda una moda de estilo básico influenciada por las tendencias internacionales, una moda que, además, se adapte rápidamente a sus necesidades respetando tres premisas fundamentales: moda, precio y calidad. La idea motriz de T-shirt & Staff es acercar la moda a la gente.
                </p>
            </div>
            <div id="GroupASub3" class="subgroup">
                <h4>Colecciones</h4>
                <p>
                	T-shirt & Staff lleva a la calle las últimas tendencias internacionales en forma de prendas fáciles, cómodas y desenfadadas. Las colecciones de T-shirt & Staff están pensadas para vestir a hombres y mujeres jóvenes de mentalidad, teniendo en cuenta que la edad ya no es una barrera a la hora de elegir nuestro vestuario.<br><br>
					Tanto para los chicos como para las chicas, T-shirt & Staff tiene líneas completamente diferenciadas. Por un lado, los "teenagers" encontrarán en sus tiendas las líneas más desenfadadas en forma de sudaderas, camisetas, tejanos, bermudas, bambas y gorras, y con el algodón como tejido principal.<br><br>
					Otras colecciones están dirigidas a chicos y chicas algo más adultos que han ido creciendo con la marca. Para ellos, T-shirt & Staff crea prendas inspiradas en las últimas tendencias internacionales para usar tanto de día como de noche, y tanto para llevar al trabajo como para usar en su tiempo de ocio. Esta línea adapta dichas tendencias a las necesidades de los clientes de T-shirt & Staff, relajándolas y convirtiéndolas en prendas fáciles de llevar.<br><br>
					La colección textil se ve reforzada por las líneas de calzado, complementos, bisutería, fragancias, auriculares, longskates y gafas de sol.
                </p>
            </div>
            <div id="GroupASub4" class="subgroup">
                <h4>Cifras</h4>
                <p>
                	En tan sólo 24 años, T-shirt & Staff ha abierto 900 tiendas en las principales calles y centros comerciales de 65 mercados (a los que hay que añadir 5 en los que opera exclusivamente por Internet). La tendencia hacia la globalización de la moda, que T-shirt & Staff ha sabido imprimir a sus colecciones, ha facilitado el rápido crecimiento de los puntos de venta. Todo ello gracias a un joven equipo de 10 000 profesionales que, con su espíritu emprendedor, su implicación y su entusiasmo, han logrado hacer de T-shirt & Staff una realidad.<br><br> 
					La cifra de ventas al cierre del 2014 se elevaba a 1284 millones de euros, un 8% más que en el año 2013. En total, se comercializaron más de 86 millones de artículos, destacando los 23 millones de camisetas.
                </p>
            </div>
            <div id="GroupASub5" class="subgroup">
                <h4>Grupo T-shirt & Staff</h4>
                <p>
                	Inditex es uno de los principales distribuidores de moda del mundo, que cuenta con ocho formatos comerciales - Zara, T-shirt & Staff, Massimo Dutti, Bershka, Stradivarius, Oysho, Zara Home y Uterqüe - y con una red de más de 6.600 tiendas en 88 mercados.<br><br>
					El Grupo Inditex reúne a más de un centenar de sociedades vinculadas con las diferentes actividades que conforman el negocio del diseño, fabricación y distribución textil.<br><br>
					El cliente es el centro de nuestro particular modelo de negocio, basado en la innovación y la flexibilidad. Nuestra forma de entender la moda - creatividad y diseño de calidad y una respuesta ágil a las demandas del mercado - han permitido una rápida expansión internacional y una excelente acogida social de todos los formatos.<br><br>
					Si quieres más información, puedes consultar la Web corporativa del grupo:<br><br>
					www.inditex.com
                </p>
            </div>
        </section>
        <section id="GroupB" class="group">
            <h2>Oficinas</h2>
            <p>
            	OFICINAS CENTRALES<br>
				T-shirt & Staff España, S.A.<br>
				Polígono Industrial Río do Pozo<br>
				Av. Gonzalo Navarro 37-43<br>
				15578 Narón (A Coruña) - Spain<br>
				T. +34 981 334 900<br><br>

				MÉXICO<br>
				Colonia Industrial Vallejo<br> 
				Delegación Azcapotzalco<br>
				Calle Poniente, 146-730<br>
				2300 México D.F.<br>
				T. +52 5550782000
            </p>
        </section>
        <section id="GroupC" class="group">
            <h2>Tiendas</h2>
        	<p>
        		El interior de las tiendas está diseñado para dar la máxima relevancia a la exposición de la moda. La distribución de los espacios, el mobiliario, la iluminación, la música, los visuales y todos los materiales están estratégicamente elegidos para ofrecer la máxima libertad al cliente en su elección. Las tiendas, como las colecciones, están vivas. Un equipo interno de interioristas introduce novedades constantemente para adaptarse a las exigencias de los clientes y para crear tiendas dinámicas y únicas. La flexibilidad es clave. Por eso, cada proyecto se trata de manera individual para adaptarse a las necesidades de cada espacio.<br><br>
				El nuevo concepto de tienda de T-shirt & Staff gira alrededor de la mítica ciudad californiana de Palm Springs. La fachada, uno de los elementos más característicos de la nueva tienda, rescata el bloque de vidrio tradicional o pavés, creando un gradiente de luz y transparencia que da la bienvenida al cliente. Se traen de vuelta materiales más propios del bricolaje o la obra como el hormigón pintado, el OSB o la madera de pino, que junto con las puertas recuperadas, el gotelé y el resto de elementos decorativos, crean una rica atmósfera de colores, materiales y texturas. La iluminación técnica, antes visible, deja paso a multitud de diferentes lámparas decorativas que crean un ambiente distinto, más cercano a un editorial de diseño de interiores que al de un espacio comercial. Un concepto de tienda que pretende ir más allá de la compra, y que en la época de las redes sociales, invite a formar parte de una experiencia que necesite ser compartida con todo el mundo. Por ello, T-shirt & Staff ha incorporado las últimas tecnologías a sus puntos de venta a través de varias instalaciones interactivas que permiten la interacción con el cliente.<br><br>
				Destaca también el esfuerzo de T-shirt & Staff en materia de ecoeficiencia. Además de optar a la certificación LEED - que reconoce su compromiso medioambiental a la hora de proyectar los puntos de venta - en sus flagships de Madrid y Rotterdam, todas las tiendas se diseñan valorando aspectos como el ahorro de energía, la eficiencia en el uso de agua, la reducción de emisiones de CO2, la mejora de la calidad ambiental interior, una adecuada administración de los recursos y la sensibilización sobre el impacto medioambiental.			        	
        	</p>
        </section>
        <section id="GroupD" class="group">
            <h2>Trabaja con nosotros</h2>
            <p>
            	Buscamos continuamente gente con ganas de aprender y que crea en lo que hace, gente con actitud. La cultura corporativa de T-shirt & Staff se basa en el trabajo en equipo, la comunicación abierta y un alto nivel de exigencia. Estos principios son la base del compromiso personal con una tarea que está enfocada a la satisfacción de nuestros clientes.<br><br>
				T-shirt & Staff ofrece a sus empleados un entorno dinámico e internacional donde se valoran las ideas y se apuesta por la promoción interna. Y no es una utopía. Gran parte del equipo directivo empezó en las tiendas. Además, creemos en la estabilidad en el empleo y la formación continua. Si estás interesado en trabajar con nosotros, los límites sólo los pondrás tú. 
            </p>
        </section>
        <section id="GroupE" class="group">
            <h2>Franquicias</h2>
            <p>
	            Desde el año 1995, T-shirt & Staff ha basado su expansión internacional en una combinación de tiendas propias y franquiciadas. A través del sistema de MASTER FRANQUICIA, ha abierto puntos de venta en Andorra, Arabia Saudí, Armenia, Azerbaiyán, Bahréin, Catar, Chipre, Colombia, Ecuador, Costa Rica, Emiratos Árabes Unidos, Egipto, El Salvador, Eslovenia, Estonia, Filipinas, Georgia, Guatemala, Honduras, Indonesia, Israel, Jordania, Kuwait, Letonia, Líbano, Lituania, Malasia, Malta, Marruecos, Montenegro, República Dominicana, Singapur, Tailandia y Venezuela.<br><br>
				Como excepción a esta fórmula de MASTER FRANQUICIA, en Albania, Alemania, Austria, Bélgica, Bosnia-Herzegovina, Bulgaria, China, Corea, Croacia, Eslovaquia, España, Francia, Grecia, Hong Kong, Hungría, Irlanda, Italia, Kazajistán, Macao, Macedonia, México, Montenegro, Países Bajos, Polonia, Portugal, Reino Unido, República Checa, Rumanía, Rusia, Serbia, Taiwán, Turquía y Ucrania las tiendas T-shirt & Staff son propias y no existe la posibilidad de obtener una franquicia de nuestra cadena.<br><br>
				Cada MASTER FRANQUICIA de T-shirt & Staff dispone de un área geográfica en exclusiva para desarrollar tiendas de su propiedad, no existiendo la opción de conceder subfranquicias a terceros o la venta mayorista.<br><br>
				El perfil habitual de un MASTER FRANQUICIA es el de una compañía con experiencia en distribución detallista, preferentemente de moda, y con capacidad financiera y de gestión suficiente para lograr un óptimo desarrollo de tiendas T-shirt & Staff en su área franquiciada. <br><br>
				T-shirt & Staff basa su éxito internacional en el mantenimiento de su personalidad en cada mercado en el que tiene presencia. Por ello, todos los aspectos relativos a su imagen han de ser coherentes con las directrices de la cadena: ubicación y superficie de tiendas, su decoración, el personal de cara al público y el merchandising.<br><br>
				Las tiendas T-shirt & Staff deben estar situadas en principales calles o centros comerciales de núcleos urbanos . Los estándares de los puntos de venta son 750 metros cuadrados, con 18 metros de fachada y 4,5 de altura libre.
            </p>
        </section>  
    </div>


	<div class="col-xs-3">
		<div class="imginfo fixed">
			<img src="<?=base_url()?>/images/empresa.jpg">
		</div>
	</div>

</div>

<?php $this->load->view('footer/footer_view'); ?>