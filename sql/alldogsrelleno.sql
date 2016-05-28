-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2016 a las 11:12:16
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alldogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ComentarioNoticia`
--

CREATE TABLE IF NOT EXISTS `ComentarioNoticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `noticia` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ComentarioNoticia`
--

INSERT INTO `ComentarioNoticia` (`id`, `usuario`, `noticia`, `titulo`, `comentario`, `fecha`) VALUES
(3, 25, 16, 'Que gran verdad!', 'Yo no tengo ningÃºn problema con el sueÃ±o, pero reconozco que dormir con mi qeurido Berni es de lo mÃ¡s reconformatable que hay para empezar el dÃ­a con buen pie.', '2016-05-28'),
(4, 25, 20, 'Son como niÃ±os', 'En mi opiniÃ³n, cualquier dueÃ±o tiene que tener cabeza para darse cuenta de que al igual que para los niÃ±os pequeÃ±os, es perjudicial.\r\nNo hace falta que ninguna universidad lo diga.\r\nAÃºn asÃ­, gran noticia.', '2016-05-28'),
(5, 26, 17, 'Nos conocen como nadie', 'Nuestras mascotas nos conocen como nadie, conocen nuestras caras y van mas allÃ¡, notan como nos encontramos.', '2016-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Evento`
--

CREATE TABLE IF NOT EXISTS `Evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Evento_ibfk_1` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `Evento`
--

INSERT INTO `Evento` (`id`, `titulo`, `contenido`, `fecha`, `ubicacion`, `foto`, `usuario`) VALUES
(4, 'Taller de Adiestramiento en grupo', 'Dado el buen recibimiento que ha tenido durante este verano nuestro "Taller de Adiestramiento en Grupo" nos complace anunciaros nuestro "Taller de adiestramiento de Invierno", a continuacion explicamos de nuevo nuestros objetivos.\r\n \r\nPara asegurar una buena convivencia es de gran importancia conocer la base del comportamiento de nuestros perros. En este nuevo curso centraremos nuestro esfuerzo en aprender a observarles y entenderles, aprenderemos como se comunican y como aprenden.\r\n \r\nTrabajaremos sobre la base de la relaciÃ³n con nuestro perro, el llamado â€œvÃ­nculoâ€ como clave del Ã©xito para un buen aprendizaje.\r\n \r\nHorario: de 20:00h a 21:00h.\r\n \r\nEl curso se realizarÃ¡ en Centro Ecuestre del Valle Perdido, situado en la Alberca (Murcia), un lugar rodeado de naturaleza, en plena sierra donde aprenderemos a conectar con nuestros perros de una forma natural.', '2030-11-01', 'Madrid', '57495cdacafaf1.77366141.png', 21),
(5, 'Curso para voluntarios de protectoras', 'Este curso estÃ¡ destinado para cualquier persona que colabore o estÃ© interesando en colaborar con el refugio. QuizÃ¡s eres un voluntario que busca una manera de hacer que los animales sean mÃ¡s adoptables o reducir los ladridos en el refugio. QuizÃ¡s eres un voluntario buscando alivio de perros demasiado excitados que casi te tiran en su entusiasmo por salir por la puerta. QuizÃ¡s eres un entrenador de perros que no sabe nada sobre refugios pero estÃ¡ buscando una manera de introducirse. Sea cual sea el caso, estÃ¡s aquÃ­ porque amas a los animales. Y nosotros estamos aquÃ­ para ayudarte a que mejores sus vidas!', '2016-07-30', 'Barcelona', '57495d82cad5c3.39623416.png', 21),
(6, 'Concierto para mascotas y otros planes para San AntÃ³n 2017 en Madrid', 'El 17 de enero, ya sabÃ©is, es el dÃ­a del patrÃ³n de todos los animales y mucha gente opta por sacar a sus bichos a la calle para que sean bendecidos en alguna iglesia. En Madrid el evento mÃ¡s animado es la romerÃ­a que se celebra en torno a La Iglesia de San AntÃ³n, en la calle de Hortaleza. Aunque durante todo el dÃ­a hay gente pululando por la zona con sus canes, que pueden ser bendecidos despuÃ©s de cada misa, la romerÃ­a es por la tarde, tras el pregÃ³n leÃ­do por Frank de la Jungla previsto para las 5 pm. Normalmente los humanos con perro no podemos entrar en el Mercado de San AntÃ³n, cosas de la Ordenanza Municipal, quÃ© se le va a hacer (como sabÃ©is, estÃ¡ prohibida la presencia de canes en tiendas de alimentaciÃ³n y mercados). Pero el dÃ­a de San AntÃ³n, el patrÃ³n consigue hacer magia y entonces sÃ­ podemos. Han organizado un evento estupendo, habrÃ¡ vinito para nosotros y chuches para ellos, ademÃ¡s de un concierto para mascotas.', '2017-01-17', 'Madrid', '57495e6e218330.36476797.png', 21),
(7, 'El sÃ¡bado, Â¡flashmobs perrunos en Barcelona, Madrid, Sevilla, Valencia...!', 'En el grupo de facebook de Flashmob Perros encontrÃ¡is todos los detalles sobre cada una de las citas. Los diversos grupos de humanos perrunos llevan meses practicando y aprendiendo las coreografÃ­as para que todo salga bien el sÃ¡bado.\r\n\r\nEs un evento que genera el buen humor y que sorprende a todos los que pasan por la zona en ese momento. Todos se organizan en puntos cÃ©ntricos y turÃ­sticos de las ciudades para tener la mÃ¡xima visibilidad. \r\n\r\nSi estÃ¡is en alguna de las ciudades donde se celebran los flashmobs no lo dudÃ©is, es muy divertido ir a verles en acciÃ³n. AdemÃ¡s, si os acercÃ¡is con vuestros canes a ver las coreografÃ­as seguro que asÃ­ tiene mayor repercusiÃ³n el evento.', '2016-06-18', 'Madrid', '57495ef7de0191.04818589.png', 21),
(8, 'II Gran Desfile de Perros de MasQPerros', 'Coincidiendo con las fiestas del Barrio de la Palomera (Quintanilla-LeÃ³n) la plataforma MasQPerros va a organizar el II Gran Desfile de Perros de MasQPerros este 1 de junio a partir de las 12:00. Â¿DÃ³nde tendrÃ¡n lugar todas estas actividades? En la explanada del PabellÃ³n â€œLa Torreâ€ (al lado del Lidl)', '2016-09-17', 'Quintanilla', '5749600f53d657.63859688.png', 21),
(9, 'PerrotÃ³n 2016', 'Ya no nos queda nada para uno de los eventos caninos mÃ¡s divertidos del otoÃ±o: el PerrotÃ³n 2016. Si a tu perro y a ti os gusta el deporte, relacionaros con otros humanos y peludos y uniros a causas solidarais, Â¡no os lo perdÃ¡is!\r\n\r\nEl PerrotÃ³n 2016 se celebra el 13 de octubre y es una de las actividades con perros Madrid que no debe faltar en tu calendario perruno. Es una carrera solidaria de la que tu perro y tÃº podrÃ©is formar parte. AdemÃ¡s, se organizan toda una serie de actividades de ocio para compartir con toda la familia.\r\n\r\nSi quieres inscribirte y participar con tu can en PerrotÃ³n 2013, entra en este link. El coste de inscripciÃ³n es de 6â‚¬ y te da derecho a participar en la carrera y ademÃ¡s te darÃ¡n un pack de bienvenida que incluye: una camiseta, una gorra, un dorsal, un paÃ±uelo, muestras de productos de alimentaciÃ³n para mascotas, una lata de aquarade, un dispensador y una chapa para personalizar.', '2016-07-22', 'Madrid', '574960ec36cc48.68153628.png', 21),
(10, 'Evento canino: DÃ­a del perro en RincÃ³n de la Victoria', 'En el RincÃ³n de la Victoria (MÃ¡laga) estÃ¡n muy perrunos Ãºltimamente :) Si recordÃ¡is, la semana pasada nos hacÃ­amos eco de la noticia de que IU del R.Victoria promovÃ­a playas para perros,  hoy publicamos una entrevista a la representante de IU MarÃ­a ConcepciÃ³n Cabezas y ahora os traemos un evento canino. \r\nEl sÃ¡bado acudimos a â€œEl DÃ­a del Perroâ€ en el CC.RincÃ³n de la Victoria. Por la maÃ±ana parecÃ­a que la lluvia amenazaba con hacer acto de presencia, pero por suerte aguantÃ³ y permitiÃ³ que se realizaran todas las actividades del programa.', '2016-10-29', 'MÃ¡laga', '57496167be8866.85253182.png', 21),
(11, 'PROPET Madrid 2016', 'La feria animales PROPET Madrid 2016 va dirigido a todos los profesionales que se dedican al sector de los animales: veterinarios y auxiliares, responsables de centros de venta, residencias de animales, empresas de formaciÃ³n y clubs de razas, adiestradores y educadores, criadores, estilistasâ€¦ Â¡Todos! Si te dedicas a alguna actividad relacionada con el mundo animal no te pierdas PROPET Madrid 2016. Y cÃ³mo no, puedes viajar a la feria con tu mascota. Busca un hotel IFEMA admite mascotas y organiza el viaje. Â¡Que ella no se lo pierda! Este aÃ±o la feria PROPET tendrÃ¡ visitantes de otros paÃ­ses europeos: empresas de Alemania, Italia, PaÃ­ses Bajos y Portugal. Este es un evento del mundo animal de gran alcance.', '2016-11-27', 'Madrid', '574962554ce6e0.11157847.png', 21),
(12, 'Campeonato Nacional de Agility 2016', 'Una excelente fecha del Campeonato Nacional de Agility se viviÃ³ en el Club de Agility de Valencia este 30 de Julio. La marea naranja se hizo presente una vez mÃ¡s llevÃ¡ndose varios podios para nuestro Club. Felicitamos a Alejandra y Fabiana que en su primera competencia en grado 1 ganaron el primer lugar en la categorÃ­a Mini / Midi. Felicitamos ademÃ¡s a Josefina y Pipa por su 2do lugar en grado 1 large y a Karina con Jolie por su tercer lugar en grado 1 large.', '2016-07-30', 'Valencia', '574963f8b7d621.21322462.png', 21),
(13, 'Campeonato Mundial de Agility 2016', 'La competiciÃ³n, que reunirÃ¡ a participantes de los cinco continentes, tendrÃ¡ un impacto econÃ³mico en la ciudad superior a los cinco millones de euros.\r\n\r\nEste fin de semana, una comisiÃ³n de la FederaciÃ³n CinolÃ³gica Internacional compuesta por 28 delegados procedentes de Europa o JapÃ³n, estÃ¡ inspeccionando los preparativos del certamen.\r\nEl Campeonato mundial de Agility, que se celebrarÃ¡ del 22 al 25 de septiembre en el pabellÃ³n PrÃ­ncipe Felipe de Zaragoza reunirÃ¡ a 450 participantes de 35 paÃ­ses de los cinco continentes. \r\nEl nÃºmero de visitantes que tendrÃ¡ la ciudad superarÃ¡ las 5.000 personas puesto que a los competidores hay que sumar acompaÃ±antes, espectadores y todo el personal tÃ©cnico necesario para este tipo de eventos. HabrÃ¡ visitantes de todo el mundo, incluyendo paÃ­ses lejanos como JapÃ³n, SudÃ¡frica y Australia, y algunos de ellos ya se han puesto en contacto con la organizaciÃ³n para prolongar su estancia en la ciudad. Por todo ello, una primera estimaciÃ³n eleva a 5.200.000 euros el impacto econÃ³mico de este certamen. Se trata de una cifra, "a la baja" ya que que podrÃ­a superar los seis millones de euros.', '2016-09-24', 'Zaragoza', '574964a9a45474.15882274.png', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticia`
--

CREATE TABLE IF NOT EXISTS `Noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `Noticia`
--

INSERT INTO `Noticia` (`id`, `usuario`, `titulo`, `contenido`, `fecha`) VALUES
(16, 21, 'Dormir con perros mejora la calidad del sueÃ±o', 'SegÃºn un estudio reciente realizado por el Centro del SueÃ±o de la ClÃ­nica Mayo de Scottsdale, Arizona, sentir cerca a nuestra mascota mejor la calidad del sueÃ±o, siendo beneficioso para el descanso. La conclusiÃ³n de la investigaciÃ³n, que se realizÃ³ con 150 pacientes, de los que 74 poseÃ­an una mascota al menos, fue que quienes duermen con perros descansan mejor porque se sienten mÃ¡s seguras y tranquilas que los que no lo hacen. "Los profesionales de la salud que trabajan con pacientes con problemas de sueÃ±o deberÃ­an preguntar sobre el ambiente a la hora de dormir en casa y, en concreto, la presencia de animales de compaÃ±Ã­a, para ayudarles a encontrar soluciones y optimizar su sueÃ±o."', '2016-05-28'),
(17, 21, 'Se demuestra que los perros distinguen si estÃ¡s contento o enfadado mirÃ¡ndote a la cara', 'El estudio se realizÃ³ con perros de diferentes razas, como retrievers, pastores, border collies, terrier y mongrels. En la fase previa, les mostraron 15 pares de imÃ¡genes de una misma persona representadas solo por las mitades de la cara en las que se apreciaban los ojos o la boca en expresiones de enfado y de alegrÃ­a y â€œÃºnicamente una emociÃ³n fue un estÃ­mulo de recompensaâ€. Tras los resultados del entrenamiento, once perros fueron seleccionados para el experimento final, que fueron cuatro pruebas. Parece que responden a una cara enfadada como responderÃ­an a un estÃ­mulo intimidatorio, lo que indica que asocian los significados con ambas expresiones, no sabemos en detalle cÃ³mo los perros son capaces de discriminar entre una expresiÃ³n y otra. Solo sabemos que son capaces. No hemos probado los procesos de su cerebro, como se harÃ­a en humanos con un escÃ¡ner. Lo mÃ¡s probable es que los perros memoricen cÃ³mo es la expresiÃ³n emocional de un humano como un todo y asÃ­ son capaces de recordar esta informaciÃ³n en frente de la pantalla tÃ¡ctil.', '2016-05-28'),
(18, 21, 'La primera camada de cachorros de perro por fecundaciÃ³n in vitro', 'La primera camada de cachorros de perro por fecundaciÃ³n in vitro ha sido conseguida por un grupo de investigadores de la Universidad Cornell de Nueva York. Esta tÃ©cnica podrÃ­a ayudar a salvar a especies en peligro de extinciÃ³n. Para conseguir la fecundaciÃ³n, los investigadores transfirieron 19 embriones previamente tratados a la perra escogida para gestar, la cual dio a luz a siete cachorros sanos, dos de una madre beagle y un padre cocker spaniel, y cinco a partir de dos parejas de padres y madres beagle. El estudio, publicado en la publicaciÃ³n especializada Public Library of Science ONE tambiÃ©n podrÃ­a suponer un paso adelante para combatir las enfermedades hereditarias en los perros, asÃ­ como para estudiar el desarrollo de las enfermedades congÃ©nitas, ya que los perros comparten mÃ¡s de 350 trastornos y rasgos hereditarios con los humanos.', '2016-05-28'),
(20, 21, 'Fumar tambiÃ©n es malo para tu perro', 'Fumar es nocivo para nuestros pulmones, pero tambiÃ©n para nuestro cerebro, y ni siquiera sirve, como popularmente se aduce, para calmar los nervios, sino todo lo contrario. Fumar no solo afecta a quien fuma, sino a quienes estÃ¡n a su alrededor. Por si fuera poco, fumar incluso es nocivo para nuestro perro. Es lo que sugiere el Ãºltimo estudio llevado a cabo por un equipo de cientÃ­ficos de la Universidad de Glasgow: las mascotas que viven en casa de un fumador tienen peor salud. Los investigadores analizaron los niveles de nicotina en la piel de animales domÃ©sticos (con dueÃ±os fumadores y no fumadores), concluyendo que tenÃ­an mÃ¡s riesgo de daÃ±o celular, de algunos tipos de cÃ¡ncer y de aumentar el peso. Las mascotas incluso tendrÃ­an mÃ¡s riesgo que los niÃ±os porque tienen menor altura y son mÃ¡s propensos al humo. Tal y como explica Clare Knottenbelt, lÃ­der del estudio: Los dueÃ±os de mascotas a menudo no piensan en el impacto que el tabaquismo podrÃ­a tener en sus mascotas. Dejar de fumar por completo es la mejor opciÃ³n para el futuro bienestar de la salud tanto suya como de su mascota.', '2016-05-28'),
(21, 21, 'El ayuntamiento de Valencia analizarÃ¡ el ADN de los excrementos de perro para multar al dueÃ±o', 'El Ayuntamiento de Valencia anunciÃ³ ayer una medida con la que espera acabar con el problema de los excrementos de perro, una cuestiÃ³n que los vecinos colocan entre sus primeras preocupaciones, segÃºn ha podido constatar la propia ConcejalÃ­a de ProtecciÃ³n Ciudadana. ConsistirÃ¡ en sacar el ADN de los excrementos abandonados en la calle y buscar a sus dueÃ±o para sancionarles, explicÃ³ la concejala Sandra GÃ³mez, que espera que la medida, ademÃ¡s de efectividad, tenga un importante efecto disuasorio. Aunque parezca complicado y seguramente caro, no lo es, al menos como lo ha planteado el consistorio valenciano aprovechando la experiencia de otras ciudades y el impulso de la FederaciÃ³n de AsociaciÃ³n de Vecinos.', '2016-05-28'),
(22, 21, 'Playas ''dog-friendly'' para disfrutar del verano con tu perro', 'En CataluÃ±a hay un total de 12 playas que permiten a los perros disfrutar de la jornada acompaÃ±ados por sus dueÃ±os. La Platera y La Rubina en Girona, La Platjola, Riumar de Bon Caponet, Cala del Cementiri y Platja de Riera d''Alforja en Tarragona y las de Cala Vallcarca, Llevant, Musclera, PicÃ²rdia y CavaiÃ³ en Barcelona. Cada cual con sus particulares condiciones paisajÃ­sticas, que el propietario debe tener en cuenta a la hora de considerar cuÃ¡l es la mÃ¡s apropiada para su acompaÃ±ante. Los perros son felices allÃ­ donde estÃ© "su humano" pero su diversiÃ³n, en especial la de aquellos que adoran el agua no acaba en la playa. Barcelona cuenta con el primer parque acuÃ¡tico para perros de EspaÃ±a, el ''Resort Canino Can JanÃ¨''. El espacio cuenta con dos piscinas una de ellas exclusiva para razas pequeÃ±as, con parques, Ã¡reas de relax e incluso atenciÃ³n veterinaria. La entrada cuesta 15 euros e incluye al perro y su acompaÃ±ante. TambiÃ©n tienen servicio de residencia vacacional para canes. La Comunidad Valenciana cuenta con cinco playas en la Costa Blanca habilitadas para el acceso de los animales. En CastellÃ³n la Playa d''Aiguaoliva y en GandÃ­a Playa Can. Su propio nombre indica lo que corroboran los viajeros que han estado allÃ­ en el foro de la web de Sr Perro, "es el paraÃ­so perruno". Un espacio muy amplio y limpio que dispone de mangueras con agua potable para duchar a los perros, quitarles la sal y de paso que puedan beber si tienen sed. En la regiÃ³n gallega de las RÃ­as Altas se encuentra la playa de San RomÃ¡n y Ãrea Grande y las demÃ¡s en el municipio de O Grove en las RÃ­as Baixas, segÃºn Home Away "son fruto de una fuerte concienciaciÃ³n ciudadana que ha llevado a adaptar el litoral a las mascotas". Cantabria tambiÃ©n ha adaptado cinco de sus playas a los turistas de caninos, seleccionando la Playa Berria (SantoÃ±a), de Brazomar, Cargadero de MioÃ±o y OriÃ±Ã³n (Castro-Urdiales), la playa de La Maza (San Vicente de la Barquera) y la de la Riberuca (Suances), todas ellas caracterizadas por ser de arena fina y tener un oleaje moderado para mayor comodidad de los canes y sus dueÃ±os. Murcia poco a poco se estÃ¡ sumando a las playas ''pet-friendly'', ya cuenta con tres, entre las que se encuentra la de Cobaticas. Las islas Baleares disponen de un total de 10 playas y calas repartidas entre Mallorca, Menorca e Ibiza a las que se puede acudir con perro los 365 dÃ­as del aÃ±o sin restricciones de acceso. Por su parte, las Canarias disponen de varias playas habilitadas para canes. En 2013 se abriÃ³ al pÃºblico de cuatro patas la de Las Canteras por peticiÃ³n de la ciudadanÃ­a. A dÃ­a de hoy ya son ocho las zonas costeras repartidas entre Lanzarote, Tenerife, La Palma y Gran Canaria que se suman a esta tendencia "amiga de los animales".', '2016-05-28'),
(23, 21, 'Un perro nacido sin patas delanteras camina gracias a una impresora 3D', 'Tras ser rescatado por una protectora canina estadounidense, Tumbles, un adorable cachorro mestizo de terrier que habÃ­a nacido sin patas delanteras, fue asistido por cientÃ­ficos de la Universidad de Ohio, que le han creado una especie de silla de ruedas concebida con una impresora 3D. Una vez recibieron el diseÃ±o, los cientÃ­ficos del Centro de InnovaciÃ³n de la Universidad de Ohio â€˜imprimieronâ€™ la silla de ruedas en unas 14 horas. Hace unos dÃ­as la probaron con el perro, que necesitarÃ¡ terapia fÃ­sica para adaptarse a ella y aprender a caminar.', '2016-05-28'),
(24, 21, 'Muere Pancho el perro de la tele', '"Con mucha tristeza tengo que comunicar que Pancho, el perro mÃ¡s famoso de EspaÃ±a, ha fallecido". Con este mensaje en Twitter el productor audiovisual Robert Fonollosa ha anunciado la muerte, a los 16 aÃ±os, de una estrella de la televisiÃ³n y la publicidad: el Jack Russel terrier Cook, protagonista del anuncio de la LoterÃ­a y participante en la serie AquÃ­ no hay quien viva, entre otros audiovisuales. La carrera de Cook en el mundo audiovisual comenzÃ³ en el campo de publicidad. Con el anuncio de la LoterÃ­a, encarnando al perro millonario con piscina propia, alcanzÃ³ la popularidad. El Ã©xito en los anuncios le facilitÃ³ la entrada en las series de televisiÃ³n. Su papel estrella fue ValentÃ­n, el perro de Vicenta, una de las protagonistas de AquÃ­ no hay quien viva. Cook llegÃ³ a rodar una pelÃ­cula en la que era el personaje central: Pancho, el perro millonario. En el largometraje, dedicado al pÃºblico infantil, el perro compartiÃ³ reparto con IvÃ¡n MassaguÃ©, Patricia Conde, Secun de la Rosa y Alex O''Dogherty, entre otros. Su cuidador comenzÃ³ a entrenar a Cook cuando solo tenÃ­a cuatro meses. El entrenamiento de un perro dedicado al audiovisual se centra en ejercicios bÃ¡sicos, como sentarse, tumbarse, quedarse quieto, ladrar a la orden y acarrear pequeÃ±os objetos. Su entrenador evitÃ³ encasillarle para adaptar mejor su trabajo a cualquier guion.', '2016-05-28'),
(25, 21, 'Â¿De quÃ© raza es tu perro? Con esta App puedes saberlo', 'Imaginad que cogÃ©is un perro abandonado por la calle o que adoptÃ¡is uno, pero no estÃ¡is seguro de a quÃ© raza pertenece. Â¿Un mil leches? Gracias a esta nueva App desarrollada por Microsoft, la tarea de averiguarlo se simplificarÃ¡ mucho. Tan solo es necesario tomar una fotografÃ­a del perro y subirla a Fetch!, que se encargarÃ¡ de llevar a cabo una exhaustiva comparativa con su base de datos para determinar la raza de nuestra mascota. TambiÃ©n puedes hacerte un selfie y probar a quÃ© raza de perro te pareces mÃ¡s. Por ejemplo, Hillary Clinton es una "descarada y fuerte Terrier", mientras que Kim Kardashian es un "caniche elegante y agradable". Desgraciadamente, como suele ser habitual en algunas aplicaciones de Microsoft, como Bing y su funciÃ³n de traductor, Ãºnicamente estÃ¡ disponible en la App Store de Estados Unidos.', '2016-05-28'),
(26, 21, 'Perros salvados de condiciones extremas', 'Salvan a un perro al que mantenÃ­an encerrado es estado de "desnutriciÃ³n extrema" y en pÃ©simas condiciones higiÃ©nicas\r\nLos detenidos estÃ¡n acusados de un delito de maltrato animal en CamariÃ±as, A CoruÃ±a. Los agentes encontraron un perro de la raza American Stanford en unas condiciones higiÃ©nicas muy desfavorables.', '2016-05-28'),
(27, 21, 'Los perros de prÃ¡cticas en malas condiciones', 'Hoy no es una semana cualquiera en la facultad de Veterinaria de la Universidad Complutense. Decenas de estudiantes esperan sentados en la puerta de la sala de juntas, donde van a reunirse con los responsables de bienestar animal. Â¿Motivo? La situaciÃ³n de los perros de prÃ¡cticas y su estado de salud, algo que preocupa a los alumnos que trabajan con ellos como parte de su formaciÃ³n. â€œAlgo pasa con los beagles", pero nadie ofrece explicaciones.', '2016-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicidad`
--

CREATE TABLE IF NOT EXISTS `Publicidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `anuncio` text COLLATE utf8_spanish_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `Publicidad`
--

INSERT INTO `Publicidad` (`id`, `usuario`, `anuncio`, `banner`) VALUES
(6, 22, 'Alimento completo para perros adultos de patÃ© con pollo 100% completo. Favorece los huesos fuertes, piel sana y pelo brillante, es de fÃ¡cil digestiÃ³n y refuerza el sistema inmunitario. Sin colorantes artificiales, sin aromas artificiales, sin conservantes.\r\n\r\nComposiciÃ³n: carnes y subproductos animales (40%, incluye 4% pollo), cereales, aceites y grasas (0,5% aceite de girasol), sustancias minerales, subproductos de origen vegetal (0,5 % pulpa de remolacha azucarera deshidratada).', '57496849539132.03885539.png'),
(7, 22, 'Alimento de alta gama especialmente indicado para perros adultos (a partir de 8 meses) de raza pequeÃ±a (hasta 10 kg de peso).\r\n\r\nNutritivo, sano y altamente digestible.\r\n\r\nAyuda a refozar el sistema inmunitario del perro.\r\n\r\nGran sabor gracias a sus ingredientes.', '574968e27a0184.56126737.png'),
(8, 22, 'Set de 4 pipetas monodosis Advantix soluciÃ³n 0,4 ml / pipeta de unciÃ³n dorsal puntual (spot-on) para perros de menos de 4 kg.\r\n\r\nEl medicamento estÃ¡ indicado para uso cutÃ¡neo. Aplicar Ãºnicamente sobre piel sana. DespuÃ©s de la aplicaciÃ³n tÃ³pica en perros, la soluciÃ³n se distribuye rÃ¡pidamente sobre la superficie corporal del animal.', '574969729845d8.28160922.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Puntua`
--

CREATE TABLE IF NOT EXISTS `Puntua` (
  `usuario` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  PRIMARY KEY (`usuario`,`servicio`),
  KEY `servicio` (`servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Puntua`
--

INSERT INTO `Puntua` (`usuario`, `servicio`, `puntuacion`) VALUES
(25, 11, 5),
(25, 13, 4),
(25, 14, 5),
(25, 24, 5),
(26, 12, 4),
(26, 16, 3),
(26, 18, 4),
(26, 19, 4),
(26, 24, 5),
(26, 27, 5),
(26, 30, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE IF NOT EXISTS `Servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patrocinado` tinyint(1) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `categoria` enum('peluqueria','veterinario','residencia','adiestrador','paseador','adopcion') COLLATE utf8_spanish_ci NOT NULL,
  `media_puntuacion` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`id`, `patrocinado`, `usuario`, `nombre`, `contenido`, `ubicacion`, `categoria`, `media_puntuacion`, `imagen`, `telefono`, `url`) VALUES
(11, 1, 21, 'NicolÃ¡s Herrero Canina', 'Atencion 24Hrs de Lunes a domingo.\r\nPersonal completamente cualificado y las mejores instalaciones.\r\nTu mascota es lo mas importante, y si necesita ayuda no dudes en traerla!\r\n\r\nEncuentranos en Calle MarquÃ©s de Sta. Ana, 30', 'Madrid', 'veterinario', 5, '574962f822fc28.97297018.png', '911 43 56 94', 'http://www.nicolasherrero.com/'),
(12, 0, 21, 'Centro Canino Carlos', 'Una de las mejores veterinarias de todo Barcelona.\r\nOfrecemos servicios y atencion de calidad \r\n\r\nAv. Diagonal, 319', 'Barcelona', 'veterinario', 4, '57496392ac0c84.73721588.png', '934 58 43 55', 'http://www.centrocaninocarlos.com'),
(13, 0, 21, 'ClÃ­nica Veterinaria Conde Duque', 'Los mejores cuidados para tus mascotas. Especializados en perros.\r\nAbierto 24Hrs\r\nCalle Conde Duque, 46', 'Madrid', 'veterinario', 4, '574964843dca05.56560979.png', '914 48 27 15', 'http://www.cvcondeduque.es/'),
(14, 1, 21, 'Mascotas Pura Vida', 'Nuestras actividades engloban una moderna Residencia para perros, Escuela y Grupo de Trabajo de Adiestramiento y Escuela-Club de Agility.\r\nEmail: info@mascotaspuravida.es\r\n\r\nEstamos en Soto del Real, cogiendo el desvÃ­o en el Km 18 de la M608 que va de Soto a Manzanares El Real. (DetrÃ¡s del Vivero).', 'Madrid', 'residencia', 5, '574965610c7102.63864800.png', '649 042 909', 'http://www.mascotaspuravida.es/'),
(15, 0, 21, 'Solican Residencia Canina y Felina', 'Para conseguir que su mascota se encuentre en inmejorables condiciones las 24 horas del dÃ­a, contamos con los mejores profesionales a su servicio: Veterinarios, adiestradores y cuidadores.', 'San SebastiÃ¡n de los Reyes, Madrid', 'residencia', 0, '574966f6dac104.18888451.png', '91 652 85 00', 'http://residenciacaninamadridsolycan.com/'),
(16, 1, 21, 'LealCan Adiestradores de Perros', 'LealCan Adiestramiento es una empresa con mÃ¡s de ventiÃºn aÃ±os de experiencia en el sector del adiestramiento canino. Hemos formado un equipo de adiestradores especialistas en educaciÃ³n canina a domicilio y desarrollamos nuestros servicios principalmente en Madrid.\r\nConsulta en nuestra web como llegar a nuestras instalaciones.', 'Madrid', 'adiestrador', 3, '574967f93ceac1.09144586.png', '646 444 555', 'http://lealcan.com/'),
(17, 0, 23, 'Villa de Canes', 'Maravillosa residencia a las afueras de la ciudad de Toledo, que permitirÃ¡ a sus perros gozar  de un buen descanso.\r\nSe ofrecen tambiÃ©n servicios de alimentaciÃ³n especializada y adiestramiento.\r\nNos encontramos en la salida 58 de la carretera de Toledo.', 'Toledo', 'residencia', 0, '5749692c635d72.01873031.png', '91 388 19 26', ''),
(18, 1, 21, 'Adiestramiento valencia', 'En Adiestramiento Valencia estamos 100% comprometidos en ofrecer el mejor servicio; para nosotros es de vital importancia tu completa satisfacciÃ³n.\r\n\r\nSomos la empresa de referencia en la Comunidad Valenciana para la formaciÃ³n de educadores caninos y estamos homologados por la Generalitat. \r\n\r\nTenemos mÃ¡s de 15 aÃ±os de experiencia', 'Valencia', 'adiestrador', 4, '5749695b67f832.59580524.png', '609 24 39 22', 'http://www.adiestramientovalencia.com/'),
(19, 1, 21, 'Peluqueria Canina Truka', 'uestro compromiso siempre serÃ¡ dar el mejor de los servicios a usted y su mascota. Hemos sido premiados en diversas competiciones nacionales e internacionales y pese a nuestra experiencia estamos en continua formaciÃ³n tanto en lo relacionado a peluquerÃ­a comercial como de exposiciÃ³n.', 'AlcorcÃ³n', 'peluqueria', 4, '574969dadfaf93.27924107.png', '91 610 07 63', 'http://www.peluqueriacaninatruka.com/'),
(20, 0, 21, 'DÃ­a de perros', 'DirecciÃ³n: Calle de Juan Ãlvarez MendizÃ¡bal, 81, 28008 Madrid', 'Madrid', 'peluqueria', 0, '57496a4ad7cc03.91328089.png', '915 47 11 40', 'http://diadeperros.com/'),
(21, 0, 23, 'Petjada', 'Centro residencial ubicado en la zona cÃ©ntrica de Barcelona para el mejor cuidado de tu mascota. Esta localizaciÃ³n te permitirÃ¡ acceder fÃ¡cilmente a las instalaciones y asÃ­ poder visitar a tu mascota sin necesidad de desplazarte. Solo se admiten  mascotas  de tamaÃ±o pequeÃ±o o mediano.', 'Carrer de Pau Claris', 'residencia', 0, '57496a99670f11.38354085.png', '91 673 23 22', ''),
(22, 0, 23, 'PasbanugaR', 'Residencia canina en la que se ofrecen servicios tanto para perros como para gatos, nos encargamos de que tu mascota tenga tambiÃ©n las mejores vacaciones de su vida.\r\nPrecios asequibles a la Ã©poca del aÃ±o.', 'Calle de los rÃ­os, 8', 'residencia', 0, '57496b974bcc07.56304910.png', '91 563 322', ''),
(23, 0, 23, 'Muntanyola Park', 'Residencia  canina de lujo equipada con spa, piscina, hilo musical en las instalaciones, etc..\r\nPrecios por dÃ­a dependiendo de los servicios contratados y la raza de tu mascota.', 'Calle gran vÃ­a de hortaleza, 12', 'residencia', 0, '57496d43b10ee4.94999893.png', '91 673 23 78', ''),
(24, 1, 21, 'Holidog: Encuentra tu paseador', 'Web de contacto con paseadores profesionales y semi-profesionales en tu ciudad.\r\nEncuentra lo que buscas.', 'Toda EspaÃ±a', 'paseador', 5, '57496d8629b6a2.77822598.png', 'Desocnocido', 'http://es.holidog.com/?gclid=CIKzlerB_MwCFYpAGwodL_wMpg'),
(25, 0, 23, 'Adiestralo', 'Adiestramiento personalizado para cada mascota con circuitos de entrenamiento y dieta especÃ­fica.\r\nOfrecemos un servicio especial a aquellos perros que tengan mÃ¡s dificultad en su comportamiento.\r\nPrecios reducidos si contratas los servicios antes del verano.', 'Calle gaviÃ¡n ruiz, 4', 'adiestrador', 0, '57496e9d3e1d29.40877900.png', '91 673 23 99', ''),
(26, 0, 21, 'Adopciones La MadrileÃ±a', 'Si estas pensando en adoptar, esta es tu oportunidad!\r\nAlegra tu hogar con un nuevo amigo y compaÃ±ero fiel.\r\n\r\nTodos nuestros animales tienen analÃ­tica de sangre y estÃ¡n desparasitados, y lo que es mÃ¡s importante, tienen nombre y figuran todos en un registro con sus datos.', 'Madrid', 'adopcion', 0, '57496f29eac990.83568209.png', '648 495 073', 'http://adopcioneslamadrilena.org/la-18/ver-perros'),
(27, 1, 21, 'ANNA: AsociaciÃ³n Nacional Amigos de los Animales', 'La AsociaciÃ³n Nacional Amigos de los Animales (ANAA) es una entidad sin Ã¡nimo de lucro que se fundÃ³ en Madrid (EspaÃ±a) en 1992, como respuesta al elevado nÃºmero de animales que son abandonados y maltratados en nuestro paÃ­s y a la deficiente atenciÃ³n de que son objeto por parte de la administraciÃ³n, que hasta el momento y salvo unas pocas excepciones, se ha limitado a recogerlos y eliminarlos, sin resolver el problema de una manera humanitaria y efectiva.', 'Toda EspaÃ±a', 'adopcion', 5, '57496fb6826605.84991281.png', '91 667 20 36', 'http://www.anaaweb.org/'),
(28, 0, 23, 'Adiestrador', 'Especialista PsicopatologÃ­a y comportamiento canino. Avalado por el Instituto Maslow Cattell para la formaciÃ³n de Postgraduados. Profesionalmente desde 2003 Disponemos de Ã¡rea de caza propia y trabajamos todo el aÃ±o en cotos intensivos.', 'Calle de los lagos, 7', 'adiestrador', 0, '574970ed6270f2.00088484.png', '91 733 23 43', ''),
(29, 0, 23, 'Stetican', 'PeluquerÃ­a canina profesional a tu alcance y a domicilio dÃ©janos tratar al pequeÃ±o rey de la casa de la mejor forma, sÃ³lo baÃ±o 10 a 12 euros y baÃ±o limpieza de oÃ­dos y peluquerÃ­a profesional desde 15 euros. Aprovecha esta oportunidad! DespuÃ©s del tercer servicio contratado el cuarto te sale gratis!', 'Las tablas, 8', 'peluqueria', 0, '57497401595d58.34613964.png', '91 777 12 12', ''),
(30, 0, 23, 'PeluquerÃ­a Pelos', 'Peluquera canina con experiencia y amante de los animales, ademÃ¡s de la tienda ofrece peluquerÃ­a canina a domicilio, sin necesidad de moverse de casa. Todo tipo de tÃ©cnicas y cortes. precios desde 20 euros. El servicio incluye: -baÃ±o y corte -vaciado de glÃ¡ndulas -limpieza de oÃ­dos -corte de uÃ±as InfÃ³rmese sin compromiso.', 'Calle golfo de salÃ³nica, 6', 'peluqueria', 5, '57497546b1ac24.28766205.png', '91 783 25 12', ''),
(31, 0, 23, 'Ponme guapo', 'PeluquerÃ­a canina comercial y de exposiciÃ³n. Cortes a tijera y a mÃ¡quina Stripping - Trimming. BaÃ±os y Arreglos. EliminaciÃ³n de nudos. UÃ±as, oÃ­dos, glÃ¡ndulas, almohadillas. PeluquerÃ­a felina: tijera y mÃ¡quina; baÃ±os y limpieza en seco; arreglos, nudos. Productos de higiene y alimentaciÃ³n. Cita previa. ConsÃºltenos sin compromiso. C/Manuel GonzÃ¡lez MartÃ­n, 52. Lateral Antiguo Estadio Insular.', 'Las palmas de Gran CanarÃ­a', 'peluqueria', 0, '57497775288db4.54245939.png', '91 783 23 99', ''),
(32, 0, 23, 'Coquetos', 'PeluquerÃ­a orientado a perros que participan en concursos caninos, ofrecemos un servicio muy especÃ­fico.\r\nPrecios por temporada del aÃ±o y por tipo de competiciÃ³n.', 'Calle de los alpes, 9', 'peluqueria', 0, '57497aeb35cd45.82568511.png', '91 734 66 22', ''),
(33, 0, 23, 'Paseadores Caninos', 'Red de paseadores distribuidos por Madrid, los servicios se ofrecen por horas.\r\nExpertos en perros de todo tipo de raza.', 'Madrid', 'paseador', 0, '57497c22e870e0.70844690.png', '672 123 111', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('admin','gestor','normal','proveedor') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `n_usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `usuario`, `pass`, `rol`) VALUES
(21, 'gestor', '$2y$10$mOvM4XBffuSNW6YfIGAhuOMswySFZ32KjcZOuWPm1ymz2/rVhLAYm', 'gestor'),
(22, 'proveedor', '$2y$10$wfx20H3KgUM6fpVJEhP.de3wEODiBe7bgzoZjNZ/v/rqCJCBtYZfe', 'proveedor'),
(23, 'admin', '$2y$10$Cj.RnCEJuZWMp1d8Y4nUfOGQRJwPqAVYV6EVimguPiqe/kMXgRpE2', 'admin'),
(25, 'pepe', '$2y$10$HNOWyLzhqzN87yOZyDyur.4E2C/f3H8V8QUh/K04PAHbgeJKNmibW', 'normal'),
(26, 'jose', '$2y$10$dMkXA49M.SOfKfAKTm2D4ecYw2W4vFCzddXVdmDq/i4tVoHMOdUyK', 'normal');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `Evento_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Noticia`
--
ALTER TABLE `Noticia`
  ADD CONSTRAINT `Noticia_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Publicidad`
--
ALTER TABLE `Publicidad`
  ADD CONSTRAINT `Publicidad_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

--
-- Filtros para la tabla `Puntua`
--
ALTER TABLE `Puntua`
  ADD CONSTRAINT `Puntua_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `Puntua_ibfk_2` FOREIGN KEY (`servicio`) REFERENCES `Servicio` (`id`);

--
-- Filtros para la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD CONSTRAINT `Servicio_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
