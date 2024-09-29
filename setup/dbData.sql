USE `db_kektapeequipement`;


-- ----------------------------------------------------------------------------------------------------------
--         -- 
-- PRODUCT --
--         --



--
-- image
--

INSERT INTO image VALUES
    (1, 'ressources/images/db/6B13_M.png'),
    (2, 'ressources/images/db/6B4.png'),
    (3, 'ressources/images/db/Bastion.jpg'),
    (4, 'ressources/images/db/BlackRock.png'),
    (5, 'ressources/images/db/Crye_Precision_AVS_chest_rig.png'),
    (6, 'ressources/images/db/DEVTAC_Ronin_ballistic_helmet_Image.png'),
    (7, 'ressources/images/db/FORT_Redut-T5_body_armor.png'),
    (8, 'ressources/images/db/Highcom_Trooper_TFO_armor_%28multicam%29.png'),
    (9, 'ressources/images/db/KORUND.png'),
    (10, 'ressources/images/db/MICH_2002_View.png'),
    (11, 'ressources/images/db/MPPV_view.png'),
    (12, 'ressources/images/db/Peltor_ComTac_2_headset.png'),
    (13, 'ressources/images/db/Racheadsetimage.png'),
    (14, 'ressources/images/db/SordinImage.png'),
    (15, 'ressources/images/db/SSH-68Image.png'),
    (16, 'ressources/images/db/StichMk2Recon_View.png'),
    (17, 'ressources/images/db/Vulkan-5_%28LShZ-5%29_heavy_helmet.png'),
    (18, 'ressources/images/db/WalkerRazorDigital.png'),
    (19, 'ressources/images/db/Wartech_TV-110_plate_carrier.png'),
    (20, 'ressources/images/db/Beta2BP.png'),
    (21, 'ressources/images/db/Flyye_MEMEBSS_Backpack2.png'),
    (22, 'ressources/images/db/6SH118_View.png'),
    (23, 'ressources/images/db/Mystery_Ranch_Blackjack_50_backpack.png');



--
-- type
--

INSERT INTO type VALUES

    (1, 'Gilet Tactique'),
    (2, 'Gilet Pare-Balles'),
    (3, 'Casque Audio'),
    (4, 'Casque Ballistique'),
    (5, 'Sacs à Dos');

--
-- material
--

INSERT INTO material VALUES
    (1, 'Aramide'),
    (2, 'Matéraux Combinée'),
    (3, 'Titane'),
    (4, 'Aluminium'),
    (5, 'Acier Blindé'),
    (6, 'PEUHD'),
    (7, 'Céramique'),
    (8, 'Polyéthylène'),
    (9, 'Tissue');

--
-- manufacturer
--

INSERT INTO manufacturer VALUES
    (1, 'US'),
    (2, 'EU'),
    (3, 'RU');

--
-- provider
--

INSERT INTO provider VALUES
    (1, 'Prapor', 'Custom'),
    (2, 'Ragman', 'Interchange'),
    (3, 'Mechanic', 'Factory'),
    (4, 'Skier', 'Shoreline'),
    (5, 'Peacekeeper', 'Custom');

--
-- body_part
--

INSERT INTO body_part VALUES
    ('HTOP', 'Dessus de la tète'),
    ('HNAP', 'Nuque'),
    ('HHER', 'Oreilles'),
    ('HEYE', 'Yeux'),
    ('HMNT', 'Machoire'),

    ('BTRX', 'Torax'),
    ('BSTM', 'Estomac'),
    ('BLAR', 'Bras Gauche'),
    ('BRAR', 'Bras Droit');



--
-- equipement
--

INSERT INTO equipement VALUES
    (1, 'Gilet d''assaut pare-balles 6B13 M (Killa Version)', 350000, 8,
    'Gilet 6B13 modifié par Killa en personne. Les plaques en céramique ont été remplacées par des plaques plus légères en polyéthylène. La classe de protection est améliorée et le poids réduit.'
    ,5, 0, 3, 2),

    (2, 'Gilet pare-balles 6B43 Zabralo-Sh 6A', 310842, 20,
    'Le gilet pare-balles 6B43 de classe de protection 6A (à peu près équivalente à la classe IIIA) est conçu pour la protection contre les balles de petit calibre dont les BP et les PP, les fragments de grenades, de mines et les armes de mêlée, mais réduit aussi les effets après pénétration au cours d''un combat.'
    ,6, 0, 3, 2),

    (3, 'Casque Diamond Age Bastion', 71790, 1,
    'D''après le fabricant, le casque Bastion est le premier casque à pouvoir arrêter une cartouche d''arme longue à balle perforante, même à bout portant.'
    ,4, 0, 1, 4),

    (4, 'Sac à dos de raid 6Sh118', 85050, 5,
    'Le sac à dos de raid 6Sh118 est un ensemble d''équipements de combat du kit d''équipement "Ratnik" de 2ème génération. Le sac à dos tactique de l''armée 6Sh118 est une modernisation du modèle du sac à dos de raid appelé 6B38 Permyachka. Conçu pour transporter du matériel d''appui-feu, des armes, des munitions, des éléments d''équipement de montagne, ainsi que ses effets personnels.'
    ,0, 48, 3, 5),

    (5, 'Sac à dos de combat Ana tactical Beta 2', 103428, 5,
    'Un sac léger et vaste par Ana Tactical. Conçu spécialement pour une utilisation dans des conditions dynamiques et des terrains accidentés.'
    ,0, 30, 3, 5),

    (6, 'Gilet tactique BlackRock', 44444, 2,
    'Gilet tactique personnalisé à porter par-dessus un gilet pare-balles pour les opérations en zone urbaine. Robuste et polyvalent, il offre des fixations de type MOLLE et ALICE.'
    ,0, 20, 1, 1),

    (7, 'Gilet tactique porte-plaque Crye Precision AVS', 167952, 9,
    'Gilet tactique porte-plaque Crye Precision AVS (Adaptive Vest System) équipé de plaques pare-balle légères. Un des gilet porte-plaque les plus confortable à porter.'
    ,4, 23, 1, 1),

    (8, 'Casque balistique DevTac Ronin', 99767, 2,
    'Un casque d''inspiration japonnaise, produit par DevTac. Non utilisé dans l''armée ou les forces spéciales. Il est cependant arrivé dans Tarkov à un prix aberrant. Il offre une protection complète de l''ensemble de la tête, mais la classe de protection n''est pas assez bonne pour qu''il soit utile en combat.'    
    ,3, 0, 1, 4),

    (9, 'Sac à dos Flyye MEMEBSS édition P2W premium', 150050, 1,
    'Sac à dos très résistant en Cordura 1000D, avec une poche séparée pour le système d''hydratation ainsi qu''un système de fixations MOLLE sur les côtés. Édition P2W premium spéciale "Worth to buy".'
    ,0, 1, 1, 5),

    (10, 'Gilet pare-balles FORT Redut-T5', 157250, 14,
    'Le gilet pare-balles FORT "Redut-T5" est une version renforcée de la série des gilets Redut, conçu grâce aux nombreuses années d''expérience des opérations de lutte antiterroriste au sein de la fédération de Russie.'
    ,5, 0, 3, 2),

    (11, 'Gilet pare-balles Highcom Trooper TFO', 188815, 7,
    'Gilet pare-balles de la marque Highcom, populaire auprès des opérateurs de la USEC. Il est doté de plaques légères en acier AR500 offrants une classe de protection de niveau 4 mais elles ne protègent que la poitrine et le dos.'
    ,4, 0, 1, 2),

    (12, 'Gilet pare-balles BNTI Korund-VM', 112619, 10,
    'Gilet pare-balles lourd Korund-VM, adopté par les unités du ministère de l''intérieur de Russie. Elle offre une protection accrue contre les balles et les fragments (classe 5 GOST).'
    ,5, 0, 3, 2),

    (13, 'Casque MSA ACH TC-2002 série MICH', 48784, 2,
    'Le casque MSA Advanced Combat Helmet (ACH) offre une protection supérieure de la tête des balles, fragments et impacts, tout en restant confortable lors du port prolongé. Le profil bas du casque réduit le risque de gènes lors de l''acquisition de cibles et assure la compatibilité avec les JNV et casque électroniques.'
    ,4, 0, 1, 4),

    (14, 'Gilet tactique de patrouille multi-usage Velocity Systems', 53599, 2,
    'Le gilet tactique de patrouille multi-usage est conçu pour les opérations de patrouilles dans des situations où les protections pare-balles ne sont pas nécessaires. C''est un gilet tactique léger avec beaucoup de poches.'
    ,0, 24, 1, 1),

    (15, 'Sac à dos Mystery Ranch Blackjack 50', 123528, 3,
    'Un sac à dos pour des raids long et fructueux par Mystery Ranch.'
    ,0, 42, 1, 5),

    (16, 'Casque antibruit électronique Peltor ComTac 2', 28314, 1,
    'Le Com-Tac 2 amplifie les sons faibles tout en supprimant les bruits résiduels. Résistant à l’eau pour une utilisation en extérieur. Produit par Peltor.'
    ,0, 0, 1, 3),

    (17, 'Casque antibruit électronique RAC pour Ops-Core FAST', 38500, 2,
    'Composant pour le casque Ops-Core FAST. Il s''agit d''un système de réduction des bruits et d''amplification des sons faibles, comporte aussi un casque radio pour la connexion aux dispositifs de communication.'
    ,0, 0, 1, 3),

    (18, 'Casque antibruit électronique MSA Sordin Supreme PRO-X/L', 29736, 1,
    'Le Sordin Supreme PRO-X/L amplifie les sons de faible niveau tout en supprimant les bruits forts. Résistant à l''eau pour une utilisation en extérieur.'
    ,0, 0, 1, 3),

    (19, 'Casque SSh-68', 20970, 2,
    'Le casque SSh-68 a remplacé le casque militaire SSh-60. Il diffère de son prédécesseur de par sa plus grande résistance, une forte inclinaison de la face avant et le raccourcissement des faces latérales.'
    ,3, 0, 3, 4),

    (20, 'Gilet tactique Stich Profi MK2', 31119, 1,
    'Le gilet tactique "MK2" peut être utilisé comme pièce d''équipement indépendante ou en complément d''un gilet pare-balles sans le système MOLLE. Convient aux instructeurs d''entraînement au combat, aux unités des forces spéciales. Configuration de reconnaissance dans le camouflage A-TACS FG. Produit par Stich Profi.'
    ,0, 18, 1, 1),

    (21, 'Casque lourd Vulkan-5', 244794, 5,
    'Casque lourd "Vulkan-5" possédant une classe de protection élevée. Il est conçu pour être utilisé avec un ensemble de combat, il offre une protection de classe 6 sur tout le pourtour de la tête contre les projectiles de moyen à gros calibre.'
    ,6, 0, 3, 4),

    (22, 'Casque antibruit électronique Walker''s Razor Digital', 43702, 1,
    'Les casques antibruit électroniques Walker''s Razor Digital sont conçus pour protéger votre audition.'
    ,0, 0, 1, 3),

    (23, 'Gilet tactique porte-plaque Wartech TV-110', 70640, 9,
    'Gilet tactique porte-plaque équipé de plaques faites d’acier blindé (classe 4) offrant une protection de la poitrine et du dos uniquement ainsi qu’un ensemble de pochettes.'
    ,4, 23, 1, 1);

--
-- provide
--

INSERT INTO provide VALUES
    (1,2,1000,100),
    (2,2,1000,100),
    (4,2,1000,100),
    (5,2,1000,100),
    (10,2,1000,100),
    (12,2,1000,100),
    (19,2,1000,100),

    (3,5,1000,100),
    (6,5,1000,100),
    (7,5,1000,100),
    (8,5,1000,100),
    (9,5,1000,100),
    (13,5,1000,100),
    (14,5,1000,100),
    (15,5,1000,100),
    (16,5,1000,100),
    (17,5,1000,100),
    (18,5,1000,100),
    (19,5,1000,100),
    (21,5,1000,100),
    (23,5,1000,100);


--
-- combine
--
INSERT INTO combine VALUES
    (1,8),
    (2,2),
    (3,2),
    (4,9),
    (5,9),
    (6,9),
    (7,2),
    (8,2),
    (9,9),
    (10,2),
    (11,2),
    (12,5),
    (13,2),
    (14,9),
    (15,9),
    (16,2),
    (17,2),
    (18,2),
    (19,5),
    (20,9),
    (21,3),
    (22,2),
    (23,2);

    
--
-- cover
--
INSERT INTO cover VALUES
    (1,'BTRX'),
    (1,'BSTM'),

    (2,'BTRX'),
    (2,'BSTM'),
    (2,'BLAR'),
    (2,'BRAR'),

    (3,'HTOP'),
    (3,'HHER'),
    (3,'HNAP'),

    (7,'BTRX'),
    (7,'BSTM'),

    (8,'HTOP'),
    (8,'HNAP'),
    (8,'HHER'),
    (8,'HEYE'),
    (8,'HMNT'),

    (10,'BTRX'),
    (10,'BSTM'),
    (10,'BLAR'),
    (10,'BRAR'),

    (11,'BTRX'),

    (12,'BTRX'),
    (12,'BSTM'),

    (13,'HTOP'),
    (13,'HHER'),
    (13,'HNAP'),

    (19,'HTOP'),
    (19,'HHER'),
    (19,'HNAP'),

    (21,'HTOP'),
    (21,'HHER'),
    (21,'HNAP'),

    (23,'BTRX');
--
-- attach
--
INSERT INTO attach VALUES
    (1,1),
    (2,2),
    (3,3),
    (4,22),
    (5,20),
    (6,4),
    (7,5),
    (8,6),
    (9,21),
    (10,7),
    (11,8),
    (12,9),
    (13,10),
    (14,11),
    (15,23),
    (16,12),
    (17,13),
    (18,14),
    (19,15),
    (20,16),
    (21,17),
    (22,18),
    (23,19);