/*
select distinct r.route_short_name, t.route_id, -(t.direction_id - 1) direction_id, s.stop_id, s.stop_name, case when s.stop_name like '% STATION%' then 1 when s.stop_name like '% RIDE%' then 1 else 0 end is_station

from gtfs_stop_times st, gtfs_trips t, gtfs_routes r, gtfs_stops s
where t.trip_id = st.trip_id
and r.route_id = t.route_id
and s.stop_id = st.stop_id

and st.stop_sequence = 1
and t.service_id <> 2

order by r.route_short_name

*/

var bus_terminus = [
{r:'1', route_id:'7634', terminii: [
{stop_id:'900349', stop_name:'MOORES MILL SHOP CTR'},
{stop_id:'907473', stop_name:'NORTH AVE STATION'}
]},

{r:'102', route_id:'7689', terminii: [
{stop_id:'907473', stop_name:'NORTH AVE STATION'},
{stop_id:'904322', stop_name:'CANDLER PARK STATION'}
]},

{r:'103', route_id:'7690', terminii: [
{stop_id:'211173', stop_name:'WINTERS CHAPEL RD'},
{stop_id:'905515', stop_name:'CHAMBLEE STATION'}
]},

{r:'104', route_id:'7691', terminii: [
{stop_id:'905508', stop_name:'DORAVILLE STATION'},
{stop_id:'905968', stop_name:'TILLY MILL RD'}
]},

{r:'107', route_id:'7692', terminii: [
{stop_id:'211300', stop_name:'INDIAN CREEK STATION'},
{stop_id:'901066', stop_name:'INMAN PARK STATION'}
]},

{r:'109', route_id:'7693', terminii: [
{stop_id:'210709', stop_name:'GA STATE STATION'},
{stop_id:'904800', stop_name:'MIDTOWN STATION'}
]},

{r:'110', route_id:'7694', terminii: [
{stop_id:'901789', stop_name:'ARTS CENTER STATION'},
{stop_id:'905666', stop_name:'LENOX STATION'}
]},

{r:'111', route_id:'7695', terminii: [
{stop_id:'134088', stop_name:'STONECREST MALL'},
{stop_id:'903391', stop_name:'INDIAN CREEK STATION'}
]},

{r:'114', route_id:'7696', terminii: [
{stop_id:'153028', stop_name:'GSU DECATUR'},
{stop_id:'904264', stop_name:'AVONDALE STATION'}
]},

{r:'115', route_id:'7697', terminii: [
{stop_id:'900686', stop_name:'KENSINGTON STATION'},
{stop_id:'134088', stop_name:'STONECREST MALL'}
]},

{r:'116', route_id:'7698', terminii: [
{stop_id:'134088', stop_name:'STONECREST MALL'},
{stop_id:'903391', stop_name:'INDIAN CREEK STATION'}
]},

{r:'117', route_id:'7699', terminii: [
{stop_id:'904264', stop_name:'AVONDALE STATION'},
{stop_id:'210346', stop_name:'PANOLA P/R'}
]},

{r:'119', route_id:'7700', terminii: [
{stop_id:'211482', stop_name:'GOLDSMITH P/R'},
{stop_id:'900686', stop_name:'KENSINGTON STATION'}
]},

{r:'12', route_id:'7642', terminii: [
{stop_id:'900079', stop_name:'CUMBERLAND MALL'},
{stop_id:'904800', stop_name:'MIDTOWN STATION'},
{stop_id:'905752', stop_name:'NORTH ATLANTA HIGH SCHOOL', mapOnly: true},
{stop_id:'213236', stop_name:'PACES PAVILION', mapOnly: true}
]},

{r:'120', route_id:'7701', terminii: [
{stop_id:'211482', stop_name:'GOLDSMITH P/R'},
{stop_id:'904264', stop_name:'AVONDALE STATION'},
{stop_id:'211190', stop_name:'E ANDREWS HS', mapOnly: true}
]},

{r:'121', route_id:'7702', terminii: [
{stop_id:'213255', stop_name:'HUGH HOWELL @ FLINTSTONE DR'},
{stop_id:'213121', stop_name:'N ROYAL ATLANTA DR'},
{stop_id:'900686', stop_name:'KENSINGTON STATION'}
]},

{r:'123', route_id:'7703', terminii: [
{stop_id:'903671', stop_name:'N DEKALB MALL'},
{stop_id:'904323', stop_name:'EAST LAKE STATION'}
]},

{r:'124', route_id:'7704', terminii: [
{stop_id:'211570', stop_name:'TUCKER'},
{stop_id:'905508', stop_name:'DORAVILLE STATION'}
]},

{r:'125', route_id:'7705', terminii: [
{stop_id:'900686', stop_name:'KENSINGTON STATION'},
{stop_id:'900278', stop_name:'N LAKE MALL'}
]},

{r:'126', route_id:'7706', terminii: [
{stop_id:'905514', stop_name:'CHAMBLEE STATION'},
{stop_id:'210850', stop_name:'N LAKE MALL'},
{stop_id:'901175', stop_name:'E EXCHANGE PL', mapOnly: true}
]},

{r:'13', route_id:'7643', terminii: [
{stop_id:'900232', stop_name:'WEST LAKE STATION'},
{stop_id:'210431', stop_name:'GA STATE STATION'}
]},

{r:'132', route_id:'7707', terminii: [
{stop_id:'902690', stop_name:'DUNWOODY CLUB'},
{stop_id:'905515', stop_name:'CHAMBLEE STATION'}
]},

{r:'140', route_id:'7708', terminii: [
{stop_id:'902641', stop_name:'WINDWARD P/R'},
{stop_id:'902725', stop_name:'N SPRINGS STATION'}
]},

{r:'141', route_id:'7709', terminii: [
{stop_id:'902641', stop_name:'WINDWARD P/R'},
{stop_id:'902725', stop_name:'N SPRINGS STATION'}
]},

{r:'142', route_id:'7739', terminii: [
{stop_id:'213285', stop_name:'SPALDING CORNERS'},
{stop_id:'903120', stop_name:'MANSELL P/R'}
]},

{r:'143', route_id:'7710', terminii: [
{stop_id:'902641', stop_name:'WINDWARD P/R'},
{stop_id:'902725', stop_name:'N SPRINGS STATION'}
]},

{r:'148', route_id:'7711', terminii: [
{stop_id:'903164', stop_name:'SANDY SPRINGS STATION'},
{stop_id:'903137', stop_name:'RIVEREDGE PKWY'}
]},

{r:'15', route_id:'7644', terminii: [
{stop_id:'212193', stop_name:'ANVIL BLOCK RD'},
{stop_id:'211891', stop_name:'LINECREST RD'},
{stop_id:'904262', stop_name:'DECATUR STATION'}
]},

{r:'150', route_id:'7712', terminii: [
{stop_id:'902866', stop_name:'DUNWOODY VILLAGE'},
{stop_id:'903009', stop_name:'DUNWOODY STATION'},
{stop_id:'902690', stop_name:'DUNWOODY CLUB', mapOnly: true}
]},

{r:'153', route_id:'7713', terminii: [
{stop_id:'902070', stop_name:'BROWNTOWN RD'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'}
]},

{r:'155', route_id:'7714', terminii: [
{stop_id:'210779', stop_name:'SWALLOW CIR'},
{stop_id:'149044', stop_name:'POLAR ROCK'},
{stop_id:'114900', stop_name:'WEST END STATION'}
]},

{r:'16', route_id:'7645', terminii: [
{stop_id:'905666', stop_name:'LENOX STATION'},
{stop_id:'102258', stop_name:'FIVE POINTS STATION'}
]},

{r:'162', route_id:'7715', terminii: [
{stop_id:'122062', stop_name:'CAMPBELLTON PLAZA'},
{stop_id:'123900', stop_name:'OAKLAND CITY STATION'}
]},

{r:'165', route_id:'7716', terminii: [
{stop_id:'144950', stop_name:'BARGE RD P/R'},
{stop_id:'120024', stop_name:'ASHLEY CASCADE APTS'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'}
]},

{r:'172', route_id:'7718', terminii: [
{stop_id:'166901', stop_name:'COLLEGE PARK STATION'},
{stop_id:'123900', stop_name:'OAKLAND CITY STATION'}
]},

{r:'178', route_id:'7719', terminii: [
{stop_id:'159344', stop_name:'HAMILTON BLVD'},
{stop_id:'136901', stop_name:'LAKEWOOD STATION'}
]},

{r:'180', route_id:'7720', terminii: [
{stop_id:'906392', stop_name:'PALMETTO'},
{stop_id:'166901', stop_name:'COLLEGE PARK STATION'},
{stop_id:'182029', stop_name:'S FULTON SVC CENTER', mapOnly: true}
]},

{r:'181', route_id:'7721', terminii: [
{stop_id:'190060', stop_name:'FAIRBURN'},
{stop_id:'146900', stop_name:'EAST POINT STATION'},
{stop_id:'183950', stop_name:'SOUTH FULTON P/R', mapOnly: true}
]},

{r:'183', route_id:'7722', terminii: [
{stop_id:'144950', stop_name:'BARGE RD P/R'},
{stop_id:'136901', stop_name:'LAKEWOOD STATION'}
]},

{r:'185', route_id:'7723', terminii: [
{stop_id:'903219', stop_name:'GSU BROOKSIDE PKWY'},
{stop_id:'902725', stop_name:'N SPRINGS STATION'}
]},

{r:'186', route_id:'7724', terminii: [
{stop_id:'211898', stop_name:'E WESLEY CHAPEL'},
{stop_id:'213360', stop_name:'FIVE POINTS STATION'}
]},

{r:'189', route_id:'7725', terminii: [
{stop_id:'183950', stop_name:'SOUTH FULTON P/R'},
{stop_id:'166900', stop_name:'COLLEGE PARK STATION'}
]},

{r:'19', route_id:'7646', terminii: [
{stop_id:'904262', stop_name:'DECATUR STATION'},
{stop_id:'905514', stop_name:'CHAMBLEE STATION'}
]},

{r:'191', route_id:'7726', terminii: [
{stop_id:'212236', stop_name:'CLAYTON JUSTICE CENTER'},
{stop_id:'136901', stop_name:'LAKEWOOD STATION'}
]},

{r:'192', route_id:'7727', terminii: [
{stop_id:'212236', stop_name:'CLAYTON JUSTICE CENTER'},
{stop_id:'146900', stop_name:'EAST POINT STATION'}
]},

{r:'193', route_id:'7728', terminii: [
{stop_id:'146900', stop_name:'EAST POINT STATION'},
{stop_id:'212236', stop_name:'CLAYTON JUSTICE CENTER'}
]},

{r:'194', route_id:'7729', terminii: [
{stop_id:'136901', stop_name:'LAKEWOOD STATION'},
{stop_id:'212168', stop_name:'SOUTHLAKE MALL'}
]},

{r:'195', route_id:'7730', terminii: [
{stop_id:'166900', stop_name:'COLLEGE PARK STATION'},
{stop_id:'213118', stop_name:'S PARK BLVD'}
]},

{r:'196', route_id:'7731', terminii: [
{stop_id:'212168', stop_name:'SOUTHLAKE MALL'},
{stop_id:'166900', stop_name:'COLLEGE PARK STATION'}
]},

{r:'2', route_id:'7635', terminii: [
{stop_id:'904323', stop_name:'EAST LAKE STATION'},
{stop_id:'907473', stop_name:'NORTH AVE STATION'}
]},

{r:'201', route_id:'7732', terminii: [
{stop_id:'555300', stop_name:'SIX FLAGS PKWY @ SERVICE RD'},
{stop_id:'901140', stop_name:'HE HOLMES STATION'}
]},

{r:'21', route_id:'7647', terminii: [
{stop_id:'900686', stop_name:'KENSINGTON STATION'},
{stop_id:'210431', stop_name:'GA STATE STATION'},
{stop_id:'211663', stop_name:'ALONZO CRIM HS', mapOnly: true}
]},

{r:'221', route_id:'7733', terminii: [
{stop_id:'901845', stop_name:'JULIETTE RD', mapOnly: true},
{stop_id:'900686', stop_name:'KENSINGTON STATION'},
{stop_id:'211482', stop_name:'GOLDSMITH P/R'}
]},

{r:'24', route_id:'7648', terminii: [
{stop_id:'903391', stop_name:'INDIAN CREEK STATION'},
{stop_id:'904322', stop_name:'CANDLER PARK STATION'}
]},

{r:'25', route_id:'7649', terminii: [
{stop_id:'905508', stop_name:'DORAVILLE STATION'},
{stop_id:'905666', stop_name:'LENOX STATION'},
{stop_id:'903165', stop_name:'MEDICAL CENTER STATION'}
]},

{r:'26', route_id:'7650', terminii: [
{stop_id:'901435', stop_name:'PERRY HEIGHTS'},
{stop_id:'907473', stop_name:'NORTH AVE STATION'}
]},

{r:'27', route_id:'7651', terminii: [
{stop_id:'902145', stop_name:'LINDBERGH STATION'},
{stop_id:'904800', stop_name:'MIDTOWN STATION'}
]},

{r:'295', route_id:'7740', terminii: [
{stop_id:'136901', stop_name:'LAKEWOOD STATION'},
{stop_id:'137082', stop_name:'ATLANTA METRO COLLEGE'}
]},

{r:'3', route_id:'7636', terminii: [
{stop_id:'903320', stop_name:'HE HOLMES STATION'},
{stop_id:'901227', stop_name:'H MILLS SR CENTER'}
]},

{r:'30', route_id:'7652', terminii: [
{stop_id:'902144', stop_name:'LINDBERGH STATION'},
{stop_id:'900278', stop_name:'N LAKE MALL'}
]},

{r:'32', route_id:'7653', terminii: [
{stop_id:'212774', stop_name:'BOULDERCREST CEDAR GROOVE'},
{stop_id:'102274', stop_name:'FIVE POINTS STATION'}
]},

{r:'33', route_id:'7654', terminii: [
{stop_id:'905514', stop_name:'CHAMBLEE STATION'},
{stop_id:'902144', stop_name:'LINDBERGH STATION'}
]},

{r:'34', route_id:'7655', terminii: [
{stop_id:'153028', stop_name:'GSU DECATUR'},
{stop_id:'904323', stop_name:'EAST LAKE STATION'}
]},

{r:'36', route_id:'7656', terminii: [
{stop_id:'212946', stop_name:'DECATUR STATION'},
{stop_id:'904800', stop_name:'MIDTOWN STATION'}
]},

{r:'37', route_id:'7657', terminii: [
{stop_id:'900349', stop_name:'MOORES MILL SHOP CTR'},
{stop_id:'901789', stop_name:'ARTS CENTER STATION'}
]},

{r:'39', route_id:'7658', terminii: [
{stop_id:'905508', stop_name:'DORAVILLE STATION'},
{stop_id:'902145', stop_name:'LINDBERGH STATION'}
]},

{r:'4', route_id:'7637', terminii: [
{stop_id:'901066', stop_name:'INMAN PARK STATION'},
{stop_id:'151144', stop_name:'REDFORD DR'},
{stop_id:'151059', stop_name:'CONSTITUTION RD'}
]},

{r:'40', route_id:'7738', terminii: [
{stop_id:'114900', stop_name:'WEST END STATION'},
{stop_id:'901789', stop_name:'ARTS CENTER STATION'}
]},

{r:'42', route_id:'7659', terminii: [
{stop_id:'102248', stop_name:'FIVE POINTS STATION'},
{stop_id:'136901', stop_name:'LAKEWOOD STATION'}
]},

{r:'47', route_id:'7660', terminii: [
{stop_id:'905514', stop_name:'CHAMBLEE STATION'},
{stop_id:'905697', stop_name:'BROOKHAVEN STATION'}
]},

{r:'49', route_id:'7661', terminii: [
{stop_id:'151060', stop_name:'METRO TRANS CENTER'},
{stop_id:'102248', stop_name:'FIVE POINTS STATION'}
]},

{r:'5', route_id:'7638', terminii: [
{stop_id:'903009', stop_name:'DUNWOODY STATION'},
{stop_id:'902145', stop_name:'LINDBERGH STATION'}
]},

{r:'50', route_id:'7662', terminii: [
{stop_id:'903509', stop_name:'CROFT PL NW'},
{stop_id:'904519', stop_name:'BANKHEAD STATION'},
{stop_id:'903825', stop_name:'FULTON INDUS OLD GORDON RD'}
]},

{r:'51', route_id:'7663', terminii: [
{stop_id:'903320', stop_name:'HE HOLMES STATION'},
{stop_id:'102258', stop_name:'FIVE POINTS STATION'}
]},

{r:'53', route_id:'7664', terminii: [
{stop_id:'212026', stop_name:'SKIPPER PL'},
{stop_id:'900232', stop_name:'WEST LAKE STATION'}
]},

{r:'55', route_id:'7665', terminii: [
{stop_id:'102274', stop_name:'FIVE POINTS STATION'},
{stop_id:'212353', stop_name:'FOREST PKWY'},
{stop_id:'212057', stop_name:'S ATLANTA HS'}
]},

{r:'56', route_id:'7666', terminii: [
{stop_id:'900957', stop_name:'ALEX DR'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'},
{stop_id:'903967', stop_name:'BAKERS FERRY @ CORNELL'}
]},

{r:'58', route_id:'7667', terminii: [
{stop_id:'902481', stop_name:'ATL INDUSTRIAL'},
{stop_id:'904519', stop_name:'BANKHEAD STATION'}
]},

{r:'6', route_id:'7639', terminii: [
{stop_id:'902145', stop_name:'LINDBERGH STATION'},
{stop_id:'901155', stop_name:'INMAN PARK STATION'},
{stop_id:'901796', stop_name:'EMORY VILLAGE', mapOnly: true}
]},

{r:'60', route_id:'7668', terminii: [
{stop_id:'900349', stop_name:'MOORES MILL SHOP CTR'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'}
]},

{r:'66', route_id:'7669', terminii: [
{stop_id:'145075', stop_name:'N CAMP CREEK PKWY'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'},
{stop_id:'210843', stop_name:'BENJAMIN E MAYS HS', mapOnly: true}
]},

{r:'67', route_id:'7670', terminii: [
{stop_id:'900231', stop_name:'WEST LAKE STATION'},
{stop_id:'114900', stop_name:'WEST END STATION'}
]},

{r:'68', route_id:'7671', terminii: [
{stop_id:'903320', stop_name:'HE HOLMES STATION'},
{stop_id:'904642', stop_name:'ASHBY STATION'},
{stop_id:'210843', stop_name:'BENJAMIN E MAYS HS', mapOnly: true}
]},

{r:'71', route_id:'7672', terminii: [
{stop_id:'900861', stop_name:'COUNTRY SQUIRE'},
{stop_id:'114900', stop_name:'WEST END STATION'}
]},

{r:'73', route_id:'7673', terminii: [
{stop_id:'212876', stop_name:'WEST PARK PL'},
{stop_id:'901290', stop_name:'BOAT ROCK BLVD'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'}
]},

{r:'74', route_id:'7674', terminii: [
{stop_id:'212219', stop_name:'S DEKALB MALL'},
{stop_id:'102236', stop_name:'FIVE POINTS STATION'}
]},

{r:'75', route_id:'7675', terminii: [
{stop_id:'210149', stop_name:'TUCKER'},
{stop_id:'904264', stop_name:'AVONDALE STATION'}
]},

{r:'78', route_id:'7676', terminii: [
{stop_id:'159296', stop_name:'BROWNS MILL'},
{stop_id:'146900', stop_name:'EAST POINT STATION'}
]},

{r:'79', route_id:'7677', terminii: [
{stop_id:'123900', stop_name:'OAKLAND CITY STATION'},
{stop_id:'146900', stop_name:'EAST POINT STATION'}
]},

{r:'8', route_id:'7640', terminii: [
{stop_id:'900686', stop_name:'KENSINGTON STATION'},
{stop_id:'905697', stop_name:'BROOKHAVEN STATION'}
]},

{r:'800', route_id:'7734', terminii: [
{stop_id:'212236', stop_name:'CLAYTON JUSTICE CENTER'},
{stop_id:'212463', stop_name:'LOVEJOY'}
]},

{r:'81', route_id:'7678', terminii: [
{stop_id:'114900', stop_name:'WEST END STATION'},
{stop_id:'146900', stop_name:'EAST POINT STATION'}
]},

{r:'82', route_id:'7679', terminii: [
{stop_id:'166901', stop_name:'COLLEGE PARK STATION'},
{stop_id:'182029', stop_name:'S FULTON SVC CENTER'},
{stop_id:'164002', stop_name:'CAMP CREEK', mapOnly: true}
]},

{r:'823', route_id:'7736', terminii: [
{stop_id:'904262', stop_name:'DECATUR STATION'},
{stop_id:'107227', stop_name:'BELVEDERE LN'}
]},

{r:'83', route_id:'7680', terminii: [
{stop_id:'144950', stop_name:'BARGE RD P/R'},
{stop_id:'123900', stop_name:'OAKLAND CITY STATION'}
]},

{r:'84', route_id:'7681', terminii: [
{stop_id:'146900', stop_name:'EAST POINT STATION'},
{stop_id:'164002', stop_name:'CAMP CREEK'}
]},

{r:'85', route_id:'7682', terminii: [
{stop_id:'903177', stop_name:'MANSELL P/R'},
{stop_id:'902725', stop_name:'N SPRINGS STATION'}
]},

{r:'86', route_id:'7683', terminii: [
{stop_id:'134088', stop_name:'STONECREST MALL'},
{stop_id:'900686', stop_name:'KENSINGTON STATION'}
]},

{r:'865', route_id:'7737', terminii: [
{stop_id:'901079', stop_name:'DOLLAR MILL RD'},
{stop_id:'903320', stop_name:'HE HOLMES STATION'}
]},

{r:'87', route_id:'7684', terminii: [
{stop_id:'902695', stop_name:'DUNWOODY PLACE (Sat/Sun)'},
{stop_id:'903009', stop_name:'DUNWOODY STATION'},
{stop_id:'902725', stop_name:'N SPRINGS STATION (M-F)'}
]},

{r:'89', route_id:'7685', terminii: [
{stop_id:'900069', stop_name:'SHANNON SQUARE'},
{stop_id:'166900', stop_name:'COLLEGE PARK STATION'}
]},

{r:'9', route_id:'7641', terminii: [
{stop_id:'901066', stop_name:'INMAN PARK STATION'},
{stop_id:'130050', stop_name:'S DEKALB MALL'}
]},

{r:'93', route_id:'7686', terminii: [
{stop_id:'146900', stop_name:'EAST POINT STATION'},
{stop_id:'164002', stop_name:'CAMP CREEK'}
]},

{r:'94', route_id:'7735', terminii: [
{stop_id:'114900', stop_name:'WEST END STATION'},
{stop_id:'213073', stop_name:'DISTRICT @ HOWELL MILL'}
]},

{r:'95', route_id:'7687', terminii: [
{stop_id:'148092', stop_name:'KING ARNOLD @ SUNSET DR'},
{stop_id:'114900', stop_name:'WEST END STATION'}
]},

{r:'99', route_id:'7688', terminii: [
{stop_id:'907473', stop_name:'NORTH AVE STATION'},
{stop_id:'210709', stop_name:'GA STATE STATION'}
]},

];