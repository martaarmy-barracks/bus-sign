<?php
// Syntax for directionData:
// <Origin> to <Destination> via <place1>, <place2>, <place3>...
// In the signs, " to " will be replaced by an arrow, and anything after 'via ' will be shown in light characters.
// If a headsign is ambiguous, mark it such using 'AMBIGUOUS' 
//   and the schedules will be merged automatically with a reasonable schedule.

// Rd. and Dr. are optional.
// Do not use dots after abbreviations like Rd, Dr, Blvd if you use these.
// Use dots after Hosp., Shop., N.
// Use Station in the " to " only, and if space is available. Spell out Station.
// Do not use 'and', 'station' in the 'via' section except Atlantic Station.

$directionData = array(
'Rainbow Dr./Snapfinger Rd' => 'Wesley Chapel to Five Points via Snapfinger Woods, Rainbow Dr, S. DeKalb Mall, GA State Station',
'Route - 110 Lenox Station' => 'Five Points to Lenox Station via Peachtree Center, Fox Theatre, Arts Center, AMTRAK, Piedmont Hosp., Buckhead',
'Route 1- Coronet Way' => 'North Ave to Moores Mill Shop. Ctr via Centennial Park, Westside Provisions, Chattahoochee Ave/Marietta Blvd',
'Route 1- Five Points Station' => 'Moores Mill Shop. Ctr to North Ave Station via Chattahoochee Ave/Marietta Blvd, Westside Provisions, Centennial Park',
'Route 102- North Avenue Station' => 'Candler Park to North Ave Station via Caroline St, Little Five Pts, Freedom Park, Ponce City Mkt',
'Route 102-Edgewood/Candler Park Station' => 'North Ave to Candler Park Station via Ponce City Mkt, Little Five Pts, Caroline St',
'Route 103 - Chamblee Station' => 'Winters Chapel to Chamblee Station via Peeler Rd, N. Shallowford, Peachtree Indus.',
'Route 103 - Wniter Chapel Rd' => 'Chamblee to Winters Chapel via Peachtree Indus., N. Shallowford, Peeler Rd',
'Route 104 - Doraville Station' => 'Winters Chapel to Doraville Station via New Peachtree',
'Route 104 - Tilly Mill Road' => 'Doraville Station to Winters Chapel via New Peachtree, Woodwin Rd',
'Route 107 - Inman Park Station' => 'Kensington to Inman Park Station via Covington Hwy, Glenwood Ave, East Atlanta Village, Moreland Ave',
'Route 107 - Kensington Station' => 'Inman Park to Kensington Station via Moreland Ave, East Atlanta Village, Glenwood Ave, Covington Hwy',
'Monroe Drive/Boulevard' => 'Midtown &hArr; GA State Station via 10th St, Monroe Dr, Boulevard, Edgewood Ave',
'Route 109-Midtown Station' => 'GA State to Midtown Station via Edgewood Ave, Boulevard, Monroe Dr, 10th St',
'Route 109- Georgia State Station' => 'Midtown to GA State Station via 10th St, Monroe Dr, Boulevard, Edgewood Ave',
'Route 110 - Five Points' => 'Lenox to Arts Center/Five Points via Buckhead, Piedmont Hosp., AMTRAK, Fox Theatre, Peachtree Center',
'Route 110 - Lenox Station' => 'Five Points to Lenox Station via Peachtree Center, Fox Theatre, Arts Center, AMTRAK, Piedmont Hosp., Buckhead',
'Route 110-Arts Center Station' => ' to Arts Center/Five Points via Peachtree, Buckhead, Piedmont Hosp., AMTRAK',
'Route 111 - Indian Creek Station' => 'Stonecrest Mall to Indian Creek via Hillandale Rd, Snapfinger Woods, Wesley Chapel, S. Indian Creek',
'Route 111 - Stone Crest Mall' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'Route 111 - Stonecrest Mall' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'Route 114 - Avondale Station' => 'Clifton Spr. Health Ctr to Avondale Station via Columbia High School, Eastgate Shop. Ctr, Columbia Dr',
'Route 114- Clifton Springs Health Center' => 'Avondale to Clifton Spr. Health Ctr via Columbia Dr, Eastgate Shop. Ctr, Columbia High School',
'Route 115- Indian Creek Station' => 'Lithonia Plaza to Indian Creek via Covington Hwy, S. Hairston Rd',
'Route 115- Main Street/Swift Street' => 'Indian Creek to Lithonia Plaza via S. Hairston Rd, Covington Hwy',
'Route 116 - Indian Creek Station' => 'Stonecrest Mall to Indian Creek via Lithonia Plaza, Redan Rd',
'Route 116 - Stonecrest Mall' => 'Indian Creek to Stonecrest Mall via Redan Rd, Lithonia Plaza',
'Route 117 - GRTA Park & Ride' => 'Kensington to Panola P/R via Rockbridge Rd, Panola Rd, Fairington Pkwy',
'Route 117 - Kensington Station' => 'Panola P/R to Kensington Station via Panola Rd, Rockbridge Rd',
'Route 119- Kensington Station' => 'Memorial Dr to Kensington Station via N./S. Hairston Rd, Redan Rd, Indian Creek Station, Kensington Rd',
'Route 119- Memorial Drive Park -Ride' => 'Kensington to Memorial Dr P/R via Kensington Rd, Indian Creek Station, Redan Rd, S./N. Hairston Rd',
'Route 12 - Cumberland Mall' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
// Careful, the headsign below is used by MARTA for BOTH #12 northbound AND southbound trips.
'Howell Mill Rd/Cumberland' => 'AMBIGUOUS',
'Route 12 - Midtown Station' => 'Cumberland Mall to Midtown Station via Northside Pkwy, Howell Mill, 10th St',
'Route 120 - Avondale Station' => 'Tucker to Avondale Station via Mountain Indus., E. Ponce, DeKalb Farmers Mkt',
'Route 120 - Greer Circle/Mountian Industrial Boulevard' => 'Avondale to Tucker via DeKalb Farmers Mkt, E. Ponce, Mountain Indus.',
'Route 121 - Kensington Station' => 'Stone Mountain to Kensington Station via N. Hairston Rd, GSU Clarkston, Memorial Dr',
'Route 121- Memorial Drive Park-Ride' => 'Kensington to Memorial Dr P/R via Memorial Dr, GSU Clarkston, N. Hairston Rd, Downtown Stone Mountain',
'Route 123 - Decatur Station' => 'N. DeKalb Mall to Belvedere via Church St, Decatur Station, McDonough St, Midway Rd',
'Route 124 - Doraville Station' => 'Tucker to Doraville via Chamblee-Tucker, Tucker-Norcross Rd, Pleasantdale, Oakcliff Rd',
'Route 124 Lawrenceville HIghway' => 'Doraville to Tucker via Oakcliff Rd, Pleasantdale, Tucker-Norcross Rd, Chamblee-Tucker Rd',
'Route 125 - Avondale Station' => 'N. Lake to Avondale Station via Montreal Rd, GSU Clarkston, N. Decatur',
'Route 125 - Northlake Mall' => 'Avondale to N. Lake Mall via N. Decatur, GSU Clarkston, Montreal Rd',
'Route 126 - Chamblee Station' => 'N. Lake to Chamblee Station via Henderson Mill, Mercer Univ., Chamblee-Tucker',
'Route 126 - Northlake Mall' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'Route 126 - Parklake Dr' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'Route 13 - Five Points Station' => 'West Lake to Five Points via Mozley Park, Fair St, Atlanta Univ Ctr, Castleberry Hill',
'Route 13 - West Lake Station' => 'Five Points to West Lake Station via Castleberry Hill, Atlanta Univ Ctr, Fair St, Mozley Park',
'Route 132 - Chamblee Station' => 'Dunwoody Club to Chamblee Station via Tilly Mill, GSU Dunwoody, N. Peachtree, Chamblee City Hall',
'Route 132 - Dunwoody Village' => 'Chamblee to Dunwoody Club via Chamblee City Hall, N. Peachtree, Tilly Mill, GSU Dunwoody',
'Route 140 - North Springs Station' => 'N. Point to N. Springs Station via North Point Mall, Mansell P/R',
'Route 140 - Windward Park n Ride' => 'N. Springs to N. Pt Pkwy-Windward via Mansell P/R, North Point Mall, North Pt Pkwy',
'Route 140- Marrietta Street/Norcross Street' => '[OLD] N. Springs to Alpharetta City Hall via Mansell P/R, North Point Mall, Haynes Bridge, Old Milton',
'Mansell Park & Ride/ Haynes Bridge Road/ Windward Park & Ride' => 'Windward, Haynes Br &hArr; N. Springs via SR-9, North Point Mall, Mansell P/R',
'Route 141- North Springs Station' => 'Windward, Haynes Br to N. Springs Station via SR-9, North Point Mall, Mansell P/R',
'Route 143 - North Springs Station' => 'Windward to N. Springs Express',
'Route 143 North Springs Station' => 'Windward to N. Springs Express',
'Route 143 Windward Park-Ride' => 'N. Springs to Windward P/R Express',
'Route 143 Windward Park-Ride Deerfield Parkway' => 'N. Springs<br/> to Windward P/R Express',
'Windward Park / Ride' => 'Windward<br/> to N. Springs Expr', // Southbound afternoon trips on the 143.
'Route 148 Sandy Springs Station' => 'Riveredge to Sandy Springs Station via Mt Vernon',
'Route 148/ Riveredge Parkway' => 'Sandy Springs to Riveredge Pkwy via Mt Vernon',
'Route 15 - Decatur Station / Decatur Square' => 'Anvil Block/River Rd to Decatur Station via S. DeKalb Mall, Candler Rd, Agnes Scott',
'Route 15- Anvil Block Road' => 'Decatur to Anvil Block OR Linecrest Rd via Agnes Scott, Candler Rd, S. DeKalb Mall, [River Rd or Panthersville Rd]',
'Route 15- Linecrest Road' => 'Decatur to Anvil Block OR Linecrest Rd via Agnes Scott, Candler Rd, S. DeKalb Mall, [River Rd or Panthersville Rd]',
'Route 150 - Dunwoody Station' => 'Dunwoody Village to Dunwoody Station via Mt Vernon, Ashford-Dunwoody, Perimeter Center Pkwy',
'Route 150 - Dunwoody Village' => 'Dunwoody Station to Dunwoody Village via Perimeter Center Pkwy, Ashford-Dunwoody, [Mt Vernon]',
'Route 150 - Mount Vernon Rd' => 'Dunwoody Station to Dunwoody Village via Perimeter Center Pkwy, Ashford-Dunwoody, [Mt Vernon]',
'Route 153 - Browntown Road' => 'HE Holmes to Browntown Rd via F. Douglass High School, Holmes Dr, J. Jackson Pkwy',
'Route 153 - Hamilton E. Holmes Station' => 'Browntown Rd to HE Holmes Station via J. Jackson Pkwy, Holmes Dr, F. Douglass High School',
'Route 155 - Georgia State Station' => 'Polar Rock to GA State Station via Windsor St, Forsyth St, Five Points',
'Route 155 - Polar Rock Road' => 'GA State to Polar Rock via Five Points, Forsyth St, Windsor St, Lakewood Ave',
'Route 16 - Executive Park Drive' => 'Five Points to Executive Park via Ralph McGill, Carter Ctr, VA Highland, Briarcliff',
'Route 16 - Five Points Station / Underground Atlanta' => 'Executive Park to Five Points via Briarcliff, VA Highland, Carter Ctr, Ralph McGill',
'Route 162 - North Camp Creek Parkway' => 'Oakland City to N. Camp Creek Pkwy via Campbellton, Stanton, Alison Ct, Headland Dr, Greenbriar Mall',
'Route 162 - Oakland City Station' => 'N. Camp Creek Pkwy to Oakland City Station via Greenbriar Mall, Headland Dr, Alison Ct, Stanton, Campbellton Rd',
'Route 165 - Barge Road Park-Ride' => 'HE Holmes to Barge Rd P/R via Fairburn Rd',
'Route 165 - Hamilton E. Holmes Station' => 'Barge Rd P/R to HE Holmes Station via Fairburn Rd',
'Route 170 - Hamiliton E. Holmes Station' => 'Brownlee Rd to HE Holmes Station  via MLK Dr, Peyton Rd',
'Route 170 - Lynhurst Drive/Benjamin E. Mays Drive' => 'HE Holmes to Benjamin E Mays Dr via MLK Dr, Peyton Rd, Lynhusrt Dr',
'Route 172 - College Park Station' => 'Oakland City to College Park Station via Sylvan Rd, Hapeville, Virginia Ave',
'Route 172 - Oakland Station  / Campbellton Road' => 'College Park to Oakland City Station via Virginia Ave, Hapeville, Sylvan Rd',
'Route 178 - Hamilton Boulevard' => 'Lakewood to Southside Indus. via Macon Dr, Browns Mill Rd',
'Route 178 - Lakewood Station' => 'Southside Indus. to Lakewood Station via Hapeville Rd, Macon Dr',
'Route 180 - College Park Station' => 'Palmetto to College Park via Roosevelt Hwy, Fairburn, Union City, Washington Rd, Camp Creek Pkwy',
'Route 180 - Palmetto' => 'College Park to Palmetto via Camp Creek Pkwy, Washington Rd, Roosevelt Hwy, Union City, Fairburn',
'Route 181 - College Park Station' => 'Fairburn to College Park via Roosevelt Hwy, Beverly Engram, Buffington Rd, GICC',
'Route 181 - Smith St' => 'College Park to Fairburn via GICC, Buffington Rd, Beverly Engram, Roosevelt Hwy',
'Route 183 - Barge Road Park N Ride' => 'Lakewood to Barge Rd P/R via Greenbriar Mall, Campbellton Rd, County Line',
'Route 183 - County Line Road' => 'Lakewood to Barge Rd P/R via Greenbriar Mall, Campbellton Rd, County Line',
'Route 183 - Lakewood Station / Fort McPherson' => 'Barge Rd P/R to Lakewood Station via Greenbriar Mall',
'Route 185 - North Springs Station' => 'Old Milton to N. Springs via Avalon, Alpharetta City Hall, Holcomb Br',
'Alpharetta/Holcomb Bridge Rd' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU',//185
'Route 185-Georgia State University Alpharetta Center' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU',
'Route 186 - Cone Street/Marietta Street' => 'E Wesley Chapel to Five Points via Snapfinger Woods, Rainbow Dr, S. DeKalb Mall, GA State Station',
'Route 186 - Pleasant Wood Drive' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'Route 186-Snapfinger Woods Dive' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'Route 189 - College Park Station' => 'S. Fulton P/R to College Park via Flat Shoals Rd, Scofield Rd, Old Natl Hwy, GICC',
'Route 189- South Fulton Park/Ride' => 'College Park to S. Fulton P/R via GICC, Old Natl Hwy, Scofield Rd, Flat Shoals Rd',
'Route 19 - Decatur Station' => 'Chamblee to Decatur Station via Clairmont Rd, PDK Airport, Plaza Fiesta, Toco Hills, VA Hospital',
'Route 19- Chamblee Station' => 'Decatur to Chamblee Station via Clairmont Rd, VA Hospital, Toco Hills, Plaza Fiesta, PDK Airport',
'Clairmont Road' => 'AMBIGUOUS',
'Route 191-Clayton County Justice Center' => 'Airport (Intl Term.) to Clayton Justice Ctr via GA-85, Riverdale P/R, Flint River/GA-138',
'Route 191- Hartsfield-Jackson Atlanta International Airport' => 'Clayton Justice Ctr to Airport (Intl Term.) via Flint River/SR138, Riverdale P/R, GA-85',
'Route 192 Springdale Road' => 'Clayton Justice Ctr to Old Dixie Rd via Tara Blvd',
'Route 192- Clayton County Justice Center' => 'Old Dixie to Clayton Justice Ctr via Tara Blvd',
'Route 193 - East Point Station' => 'Clayton Justice Ctr to East Point Station via Jonesboro Rd, Clayton State Univ., Forest Park, Hapeville',
'Route 193- Clayton County Justice Center' => 'East Point to Clayton Justice Ctr via Hapeville, Forest Park, Clayton State Univ., Jonesboro Rd',
'Route 194- Clayton County Justice Center' => 'East Point to Clayton Justice Ctr via Sylvan Rd, Hapeville, Conley Rd, Moreland Ave, Southlake Mall, Tara Blvd',
'Route 195- College Park Station' => 'Anvil Block Rd to College Park via Forest Pkwy, Forest Park, Roosevelt Hwy, GICC',
'Route 195/ Anvil Block Road' => 'College Park to Anvil Block Rd via GICC, Roosevelt Hwy, Forest Park, Forest Pkwy',
'Route 196- College Park Station' => 'Southlake Mall to College Park Station via Mt Zion, Upper Riverdale, Riverdale P/R, GA-85',
'Route 196- Southlake Mall' => 'College Park to Southlake Mall via GA-85, Riverdale P/R, Upper Riverdale, Mt Zion',
'Route 2 - Decatur Station' => 'North Ave to Decatur Station via North Ave, Ponce City Market, Fernbank Museum',
'Route 2 - North Avenue Station' => 'Decatur to North Ave Station via W. Ponce, Fernbank Museum, Ponce City Market, North Ave',
'Route 201 - H. E. Holmes Station / CC Transit' => 'Six Flags to HE Holmes (Seasonal)',
'Route 201 - Six Flags Over Georgia' => 'HE Holmes to Six Flags (Seasonal)',
'Route 21 - Kensington Station' => 'GA State to Kensington Station via Memorial Dr, Oakland Cemetery, East Lake Golf Club, Belvedere Plaza',
'Route 21- Georgia State Station' => 'Kensington to GA State Station via Memorial Dr, Belvedere Plaza, East Lake Golf Club, Oakland Cemetery, King Memorial Station',
'Route 221- Kensington Station' => 'Memorial Dr to Kensington Station Ltd via Memorial Dr, GSU Clarkston (Limited stops)',
'Route 221- Memorial Drive Park Ride' => 'Kensington to Memorial Dr P/R Ltd via Memorial Dr, GSU Clarkston,  N. Hairston Rd (Limited stops)',
'Route 24- Edgewood/ Candler Park' => 'Indian Creek to East Lake Station via Glenwood, McAfee, Hosea Williams Dr, Kirkwood',
'Route 24 - East Lake Station' => 'Candler Park to Indian Creek Station via Hosea Williams Dr, Kirkwood, McAfee, Glenwood',
'East Lake/Hosea Williams' => 'AMBIGUOUS', //24
'Route 24- Indian Creek Station' => 'East Lake to Indian Creek Station via Hosea Williams Dr, Kirkwood, McAfee, Glenwood',
'Route 25 - Doraville Station' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'Route 25 - Lenox Station' => 'Doraville/Medical Ctr to Lenox Station via Oglethorpe Univ., Brookhaven',
'Route 25- Medical Center Station' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'Route 26 - Perry Heights' => 'North Ave to Perry Blvd via North Ave, Bankhead Station',
'Route 26 North Avenue Station' => 'Perry Blvd to North Ave Station via Bankhead Station, North Ave',
'Route 27 - Lindbergh Station / Marta Headquarters' => 'Midtown to Lindbergh Station via Bot. Gardens, Ansley Mall, Cheshire Br.',
'Route 27- Midtown Station' => 'Lindbergh to Midtown Station via Cheshire Br., Ansley Mall, Bot. Gardens',
'Route 3 - Candler Park Station' => 'HE Holmes to Candler Park Station via Fair St, Mozley Park, Atlanta Univ. Ctr, Five Pts, [Highland or Irwin St]',
'Route 3 - H. E. Holmes Station' => 'Candler Park to HE Holmes Station via [Highland or Irwin St], Five Pts, Atlanta Univ. Ctr, Fair St, Mozley Park',
'Route 3 - Pryor St / Wall St' => 'HE Holmes to Candler Park Station via Fair St, Mozley Park, Atlanta Univ. Ctr, Five Pts, [Highland or Irwin St]',
'Route 30 - Lindbergh Station' => 'N. Lake to Lindbergh Station via LaVista, Lakeside, Toco Hills',
'Route 30- Northlake Mall' => 'Lindbergh to N. Lake Mall via LaVista, Toco Hills, Lakeside',
'Route 32 - Metro Transitional Center' => 'Five Pts to Bouldercrest via Capitol, Zoo Atlanta, Confederate Ave',
'Route 32-Five Points Station' => 'Bouldercrest to Five Points via Confederate Ave, Zoo Atlanta, Capitol',
'Route 33 - Chamblee Station' => 'Lenox to Chamblee Station via Executive Park, Briarcliff, I-85 Access Rd, Chamblee-Tucker',
'Route 33- Lenox Station' => 'Chamblee to Lenox Station via Chamblee-Tucker, I-85 Access Rd, Briarcliff, Executive Park',
'Gresham/Clifton Springs' => 'East Lake &hArr; GSU-Decatur via 2nd Ave, Gresham Rd, Clifton Springs', //34
'Route 34- Eastlake Station' => 'GSU-Decatur to East Lake Station via Clifton Springs, Gresham Rd, 2nd Ave',
'Route 34- Ga State University/Perimeter College' => 'East Lake to GSU-Decatur via 2nd Ave, Gresham Rd, Clifton Springs',
'Route 36- Decatur Station' => 'Midtown to Decatur Station via VA Highland, Emory, DeKalb Medical<br/><span class="detour">Rerouting to Decatur due to Avondale TOD construction.</span>',
'Route 36 Midtown Station' => 'Decatur to Midtown Station via DeKalb Med, Emory, VA Highland<br/><span class="detour">Rerouting to Decatur due to Avondale TOD construction.</span>',
'Route 37 Moores Mill Rd' => 'Arts Center to Moores Mill Shop. Ctr via Atlantic Station, Bellemeade Ave, Defoors Ferry',
'Route 37- Art Center Station' => 'Moores Mill Shop. Ctr to Arts Center Station via Defoors Ferry, Bellemeade Ave, Atlantic Station',
'Route 39 Doraville Station' => 'Lindbergh to Doraville Station via Sydney Marcus Blvd, Buford Hwy, Corporate Square, Plaza Fiesta',
'Route 39 Lindbergh Station' => 'Doraville to Lindbergh Station via Buford Hwy, Plaza Fiesta, Corporate Square, Sydney Marcus Blvd',
'Route 4 - Iman Park Station' => 'Thomasville to Inman Park Station via Forest Park Rd, Kipling St, Moreland Ave',
'Flint River Rd- Route 191' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 4- Rebel Forest Drive' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 4- Metro Transitional Center' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 42 - Lakewood Station' => 'Five Points to Lakewood Station via Mc Daniel St, Pryor Rd, Lakewood Amphitheater',
'Route 42- Five Points' => 'Lakewood to Five Points Station via Lakewood Amphitheater, Pryor Rd, Mc Daniel St',
'Route 47 - Chamblee Station' => 'Brookhaven to Chamblee Station via Briarwood, I-85 Access Rd, Shallowford',
'Route 47- Broohaven Station' => 'Chamblee to Brookhaven Station via Shallowford, I-85 Access Rd, Briarwood',
'Route 49- Five Points Station' => 'Moreland/Woodland to Five Points via Custer Ave, Hill St, Pollard Blvd, Central Ave',
'Route 49- Moreland Drive/ Woodland Ave' => 'Five Points to Moreland/Woodland Ave via Pryor St, Pollard Blvd, Mc Donough Blvd',
'Route 5 - Dunwoody Station' => 'Lindbergh to Dunwoody Station via Piedmont Rd, Buckhead, Roswell Rd, Hammond Dr',
'Route 5 - Lindbergh Station' => 'Dunwoody to Lindbergh Station via Hammond Dr, Roswell Rd, Buckhead, Piedmont Rd',
'Route 50 - Bankhead Station' => 'Carroll Heights to Bankhead Station via Bolton Rd, Donald E. Hollowell Pkwy',
'Route 50- Croft Place/ Bolton Road' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'Route 50-Old Gordon Road' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'Route 51- Westlake Station' => 'Five Pts to New Jersey Ave via CNN, Centennial Park, Joseph E. Boone Blvd',
'Route 51-Five Points' => 'Joseph E. Boone to Five Points via Centennial Park, CNN',
'Route 51-Joseph E. Boone Bvld' => 'Five Pts to New Jersey Ave via CNN, Centennial Park, Joseph E. Boone Blvd',
'Route 53- Skipper Dr./ Harwell Rd' => 'West Lake to Skipper Dr via West Lake Ave, Baker Rd, Allegro Dr',
'Route 53- West Lake Station' => 'Skipper Dr to West Lake Station via Allegro Dr, Baker Rd, West Lake Ave',
'Route 55 - Five Points Station' => 'Forest Park to Five Points via Jonesboro Rd, Mc Donough Blvd, Hank Aaron Dr',
'Route 55- Old Conley Road/Jonesboro Road' => 'Five Points to Forest Park via Hank Aaron Dr, Mc Donough Blvd, Jonesboro Rd',
'Route 56 - Hamilton E. Holmes Station' => 'Adamsville to HE Holmes Station via Wilson Mill, Bakers Ferry, Collier Rd, Burton Rd',
'Route 56 - Plainville Circle' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry, [Wilson Mill or Boulder Park]',
'Route 56- Dollar Mill Road' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry, [Wilson Mill or Boulder Park]',
'Route 58 - Bankhead Station' => 'Atlanta Industrial to Bankhead Station via Northwest Dr, Hollywood Dr, Donald E. Hollowell Pkwy',
'Route 58- Atlanta Industrial Pkwy' => 'Bankhead to Atlanta Industrial via Donald E. Hollowell Pkwy, Hollywood Rd, Northwest Dr',
'Route 6 - Inman Park Station' => 'Lindbergh to Inman Park Station via LaVista, Emory, Briarcliff, Moreland',
'Route 6 - Lindbergh Station' => 'Inman Park to Lindbergh Station via Moreland, Briarcliff, Emory, LaVista',
'Route 60 - Hamilton E. Holmes Station' => 'Moores Mill Shop. Ctr to HE Holmes Station via Hollywood Rd, F. Douglass High School, Holmes Dr',
'Route 60 - Moores Mill Shopping Center' => 'HE Holmes to Moores Mill Shop. Ctr via Holmes Dr, F. Douglass High School, Hollywood Rd',
'Route 66 - Barge Rd. Park/Ride' => 'HE Holmes to Barge Rd P/R via Lynhurst Dr, Harbin Rd, Therell High School, Greenbriar Mall',
'Route 66 - Hamilton E. Holmes Station' => 'Barge Rd P/R to HE Holmes Station via Greenbriar Mall, Therell High School, Harbin Rd, Lynhurst Dr',
'Route 66 - Hamilton E.Holmes Station' => 'Barge Rd P/R to HE Holmes Station via Greenbriar Mall, Therell High School, Harbin Rd, Lynhurst Dr',
'Route 67 - West End Station' => 'Dixie Hills to West End Station via West Lake Station, Westview Cemetery, Lucile St',
'Route 67 - West Lake Station' => 'West End to Dixie Hills via Lucile St, Westview Cemetery, West Lake Station',
'Route 68 - Asby  Station' => 'Lorraine/Granada to Ashby Station via Donnelly Ave, West End Station, Atlanta Univ. Ctr',
'Route 68 - Ashby St. Station' => 'Lorraine/Granada to Ashby Station via Donnelly Ave, West End Station, Atlanta Univ. Ctr',
'Route 68 - Benjamin E. Mays Drive' => 'Ashby to Lorraine/Granada via Atlanta Univ. Ctr, West End Station, Beecher St',
'Route 68 South Gordon Street' => 'Ashby to Lorraine/Granada via Atlanta Univ. Ctr, West End Station, Beecher St',
'Route 71 - Cascade / Ashley Courts' => 'West End to [Ashley Ct OR Country Sq] via Abernathy Blvd, Cascade Rd, Cascade Springs Preserve, Cascade Crossing',
'Route 71 - Country Squire Apartments / Ashley Court Apartments' => 'West End to [Ashley Ct OR Country Sq] via Abernathy Blvd, Cascade Rd, Cascade Springs Preserve, Cascade Crossing',
'Route 71 - West End Station' => 'Ashley Ct/Country Sq to West End via Cascade Rd, Cascade Crossing, Cascade Springs Preserve, Abernathy Blvd',
'Route 73 - Boat Rock Parkway' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'Route 73 - Hamilton E. Holmes Station' => 'Boat Rock to HE Holmes Station via Fulton Industrial, Fulton Co Airport, Adamsville',
'Route 74 - Battle Forrest Drive' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'Route 74 - Five Points Station' => 'S. DeKalb Mall to Five Points via [Whites Mill or Battle Forest], Flat Schoals, East Atlanta Vlg',
'Route 74- Whites Mill Road' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'Route 75 - Avondale Station' => 'Tucker to Avondale Station via Tucker High School, Lawrenceville Hwy, N. DeKalb Mall, DeKalb Indus.',
'Route 75 - North Royal Atlanta Drive' => 'Avondale to Tucker via DeKalb Indus., N. DeKalb Mall, Lawrenceville Hwy, Tucker High School',
'Route 78 - East Point Station' => 'Browns Mill to East Point Station via Cleveland Ave',
'Route 78 - Jonesboro Road/Cleveland Avenue' => 'East Point to Browns Mill Park via Cleveland Ave, Jonesboro Rd',
'Route 79- East Point Station' => 'Oakland City to East Point Station via Sylvan Rd, Springdale Rd, Jefferson Ave, Cleveland Ave',
'Route 79- Oakland City Station' => 'East Point to Oakland City Station via Cleveland Ave, Jefferson Ave, Springdale Rd, Sylvan Rd',
'Route 8 - Avondale Station' => 'Brookhaven to Kensington Station via Executive Park, Toco Hills, N. DeKalb Mall<br/><span class="detour">Rerouting to Kensington due to Avondale TOD construction.</span>',
'Route 8 - Brookhaven Station' => 'Kensington to Brookhaven Station via N. DeKalb Mall, Toco Hills, Executive Park<br/><span class="detour">Rerouting to Kensington due to Avondale TOD construction.</span>',
'Route 81 - Campbellton Road' => 'West End to Adams Park via Oglethorpe Ave, Lawton St, Westmont Rd, Venetian Hills',
'Route 81 - West End Station' => 'Adams Park to West End Station via Venetian Hills, Westmont Rd, Lawton St, Oglethorpe Ave',
'Route 82 - College Park Station' => 'Union City to College  Park via Roosevelt Ave, Welcome All Rd, Camp Creek Pkwy/Marketplace',
'Route 82 - Union City' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All Rd, Roosevelt Hwy',
'Route 82 Camp Creek Market Place' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All, Roosevelt Hwy',
'Route 83 - Barge Road Park n Ride' => 'Oakland City to Barge Rd P/R via Campbellton Rd, Adams Park, Greenbriar Mall',
'Route 83 - Oakland City Station' => 'Barge Rd P/R to Oakland City Station via Greenbriar Mall, Campbellton Rd, Adams Park',
'Route 84 - East Point Station' => 'Deerwood to East Point Station via Fairburn Rd, Camp Creek Marketplace, Mt Olive, Washington Rd',
'Route 84- N.Camp Creek Parkway' => 'East Point to Deerwood via Washington Rd, Mt Olive, Camp Creek Marketplace, Fairburn Rd',
'Route 84- Social Security Administration Office' => 'East Point to Deerwood via Washington Rd, Mt Olive, Camp Creek Marketplace, Fairburn Rd',
'Route 85 - Mansell Park & Ride/Mansell Road' => 'N. Springs to Mansell P/R via Dunwoody Place, Historic Roswell, Mansell Rd',
'Route 85 - North Springs Station' => 'Mansell P/R to N. Springs via Mansell Rd, Historic Roswell, Dunwoody Place',
'Route 86 - East Lake Station' => 'Stonecrest Mall to Kensington Station via Hillandale Rd, Snapfinger Woods, Peachcrest Rd',
'Route 86- Stonecrest Mall' => 'Kensington to Stonecrest Mall via Peachcrest Rd, Snapfinger Woods, Hillandale Rd',
'Route 87 - Dunwoody Station' => 'Dunwoody Pl. to Dunwoody Station via Roswell Rd, Hammond Dr',
'Route 87 - North Springs Station' => 'Dunwoody to N. Springs via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'Route 87 Roswell Road/ Dunwoody Place' => 'Dunwoody to N. Springs via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'Roswell Rd./Morgan Falls' => 'Dunwoody Pl. to Dunwoody Station via Roswell Rd, Hammond Dr',
'Route 89 -  College Park Station' => 'Shannon Square to College Park via Jonesboro Rd, Old Natl Hwy, Sullivan Rd, Best Rd',
'Route 89- Union Station' => 'College Park to Shannon Square via Best Rd, Sullivan Rd, Old Natl Hwy, Jonesboro Rd',
'Toney Valley /Peachcrest Rd.' => 'S. DeKalb Mall &hArr; Inman Park Station via Tilson Rd, Brannen Rd, East ATL Vlg',//9
'Route 9- Inman Park Station' => 'S. DeKalb Mall to Inman Park Station via Tilson Rd, Brannen Rd, East ATL Vlg',
'Route 9- Rainbow Way' => 'Inman Park to S. DeKalb Mall via East ATL Vlg, Brannen Rd, Tilson Rd',
'Route 95 - King Arnold Street' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'Route 95 - West End Station' => 'Hapeville to West End Station via King Arnold St, Metropolitan Pkwy, Atlanta Tech College',
'Route 95 Atlanta Tech /Atlanta Metro College' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'Route 99 - Georgia State Station' => 'North Ave to GA State Station via Boulevard, MLK Center, Sweet Auburn',
'Route 99 - North Avenue Station' => 'GA State to North Ave Station via King Mem, MLK Center, Boulevard, North Ave',

/*
'1 MOORES MILL VIA CHATTAHOOCHEE AVE' => 'North Ave to Moores Mill Shop. Ctr via Centennial Park, Westside Provisions, Chattahoochee Ave/Marietta Blvd',
'1 MOORES MILL VIA MARIETTA BLVD' => 'North Ave to Moores Mill Shop. Ctr via Centennial Park, Westside Provisions, Chattahoochee Ave/Marietta Blvd',
'1 NORTH AVE STATION VIA MARIETTA BLVD' => 'Moores Mill Shop. Ctr to North Ave Station via Chattahoochee Ave/Marietta Blvd, Westside Provisions, Centennial Park',
'1 NORTH AVENUE STATION' => 'Moores Mill Shop. Ctr to North Ave Station via Chattahoochee Ave/Marietta Blvd, Westside Provisions, Centennial Park',
'1 NORTH AVENUE STATION VIA CHATTAHOOCHEE AVE' => 'Moores Mill Shop. Ctr to North Ave Station via Chattahoochee Ave/Marietta Blvd, Westside Provisions, Centennial Park',
'102-EDGEWOOD/CANDLER PARK STATION VIA PONCE DE LEON' => 'North Ave to Candler Park Station via Ponce City Mkt, Little Five Pts, Caroline St',
'102-NORTH AVENUE STATION VIA PONCE DE LEON' => 'Candler Park to North Ave Station via Caroline St, Little Five Pts, Freedom Park, Ponce City Mkt',
'103 CHAMBLEE STA' => 'Winters Chapel to Chamblee Station via Peeler Rd, N. Shallowford, Peachtree Indus.',
'103 PEELER RD-N. SHALLOWFORD' => 'Chamblee to Winters Chapel via Peachtree Indus., N. Shallowford, Peeler Rd',
'104 DORAVILLE STA' => 'Winters Chapel to Doraville Station via New Peachtree',
'104 WINTERS CHAPEL RD' => 'Doraville Station to Winters Chapel via New Peachtree, Woodwin Rd',
'107 GLENWOOD RD / INMAN PK STA' => 'Kensington to Inman Park Station via Covington Hwy, Glenwood Ave, East Atlanta Village, Moreland Ave',
'107 GLENWOOD RD / KENSINGTON STA' => 'Inman Park to Kensington Station via Moreland Ave, East Atlanta Village, Glenwood Ave, Covington Hwy',
'109 MONROE DR./BOULEVARD VIA MIDTOWN STATION' => 'Sweet Auburn to Midtown Station via Edgewood Ave, Boulevard, Grady HS, 10th St',
'109 MONROE DR/BOULEVARD VIA GA STATE STATION' => 'Midtown to GA State Station via Grady HS, Boulevard, Edgewood Ave',
'110 THE PEACH - FIVE PTS STA - DOWNTOWN' => 'Lenox to Arts Center/Five Points via Buckhead, Piedmont Hosp., AMTRAK, Fox Theatre, Peachtree Center',
'110 THE PEACH - LENOX STA- BUCKHEAD' => 'Five Points to Lenox Station via Peachtree Center, Fox Theatre, Arts Center, AMTRAK, Piedmont Hosp., Buckhead',
'110 THE PEACH - LENOX STA- BUCKHEAD - VIA ARTS CTR STA' => 'Five Points to Lenox Station via Peachtree Center, Fox Theatre, Arts Center, AMTRAK, Piedmont Hosp., Buckhead',
'110 THE PEACH- ARTS CTR STATION' => 'Lenox to Arts Center/Five Points via Buckhead, Piedmont Hosp., AMTRAK, Fox Theatre, Peachtree Center',
'111 INDIAN CREEK STA' => 'Stonecrest Mall to Indian Creek via Hillandale Rd, Snapfinger Woods, Wesley Chapel, S. Indian Creek',
'111 INDIAN CREEK VIA A WILLIAMS TOWERS' => 'Stonecrest Mall to Indian Creek via Hillandale Rd, Snapfinger Woods, Wesley Chapel, S. Indian Creek',
'111 SNAPFINGER WOODS DR/STONECREST' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'111 SNAPFINGER WOODS DR/STONECREST VIA A WILLIAMS TOWERS' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'114 AVONDALE STA' => 'Clifton Spr. Health Ctr to Avondale Station via Columbia High School, Eastgate Shop. Ctr, Columbia Dr',
'114 COLUMBIA DR' => 'Avondale to Clifton Spr. Health Ctr via Columbia Dr, Eastgate Shop. Ctr, Columbia High School',
'115 COVINGTON HWY / S HAIRSTON RD /  EVANSMILL P/R' => 'Indian Creek to Lithonia Plaza via S. Hairston Rd, Covington Hwy',
'115 INDIAN CREEK STATION' => 'Lithonia Plaza to Indian Creek via Covington Hwy, S. Hairston Rd',
'116  INDIAN CREEK VIA HEALTH CENTER' => 'Stonecrest Mall to Indian Creek via Lithonia Plaza, Redan Rd',
'116 INDIAN CREEK STA' => 'Stonecrest Mall to Indian Creek via Lithonia Plaza, Redan Rd',
'116 REDAN RD - STONECREST' => 'Indian Creek to Stonecrest Mall via Redan Rd, Lithonia Plaza',
'117 ROCKBRIDGE RD / PANOLA RD / GRTA P/R' => 'Avondale to Panola P/R via Rockbridge Rd, Panola Rd, Fairington Pkwy',
'117 ROCKBRIDGE RD / PANOLA RD / GRTA P/R  VIA LOU WALKER CENTER' => 'Avondale to Panola P/R via Rockbridge Rd, Panola Rd, Fairington Pkwy',
'117 ROCKBRIDGE RD/PANOLA RD/AVONDALE STA' => 'Panola P/R to Avondale Station via Panola Rd, Rockbridge Rd',
'117 ROCKBRIDGE RD/PANOLA RD/AVONDALE STA VIA LOU WALKER CENTER' => 'Panola P/R to Avondale Station via Panola Rd, Rockbridge Rd',
'119 KENSINGTON STA' => 'Memorial Dr to Kensington Station via N./S. Hairston Rd, Redan Rd, Indian Creek Station, Kensington Rd',
'119 N HAIRSTON RD MEMORIAL DR P/R' => 'Kensington to Memorial Dr P/R via Kensington Rd, Indian Creek Station, Redan Rd, S./N. Hairston Rd',
'12 CUMBERLAND VIA HOWELL MILL' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'12 CUMBERLAND VIA NORTHSIDE' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'12 HOWELL MILL / CUMBERLAND' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'12 HOWELL MILL / N SIDE HIGH SCH' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'12 HOWELL MILL-MIDTOWN STA' => 'Cumberland Mall to Midtown Station via Northside Pkwy, Howell Mill, 10th St',
'12 MIDTOWN STA VIA  NORTH SIDE' => 'Cumberland Mall to Midtown Station via Northside Pkwy, Howell Mill, 10th St',
'12 MIDTOWN STA VIA HOWELL MILL' => 'Cumberland Mall to Midtown Station via Northside Pkwy, Howell Mill, 10th St',
'12 PACES PAVILION VIA NORTHSIDE' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'120 AVONDALE STATION' => 'Tucker to Avondale Station via Mountain Indus., E. Ponce, DeKalb Farmers Mkt',
'120 AVONDALE STATION VIA TUCKER' => 'Tucker to Avondale Station via Mountain Indus., E. Ponce, DeKalb Farmers Mkt',
'120 E PONCE / TUCKER ANDREWS HIGH SCH' => 'Avondale to Tucker via DeKalb Farmers Mkt, E. Ponce, Mountain Indus.',
'120 E PONCE DE LEON / TUCKER' => 'Avondale to Tucker via DeKalb Farmers Mkt, E. Ponce, Mountain Indus.',
'121 KENSINGTON STATION' => 'Stone Mountain to Kensington Station via N. Hairston Rd, GSU Clarkston, Memorial Dr',
'121 KENSINGTON STATION VIA E PONCE / JULIETTE RD' => 'Stone Mountain to Kensington Station via N. Hairston Rd, GSU Clarkston, Memorial Dr',
'121 KENSINGTON STATION VIA STONE MOUNTAIN' => 'Stone Mountain to Kensington Station via N. Hairston Rd, GSU Clarkston, Memorial Dr',
'121 MEMORIAL DR - DEKALB E CAMPUS' => 'Kensington to Memorial Dr P/R via Memorial Dr, GSU Clarkston, N. Hairston Rd, Downtown Stone Mountain',
'121 MEMORIAL DR P/R VIA E PONCE / JULIETTE RD' => 'Kensington to Memorial Dr P/R via Memorial Dr, GSU Clarkston, N. Hairston Rd, Downtown Stone Mountain',
'121 MEMORIAL DR VIA STONE MOUNTAIN' => 'Kensington to Memorial Dr P/R via Memorial Dr, GSU Clarkston, N. Hairston Rd, Downtown Stone Mountain',
'123 BELEVEDERE' => 'N. DeKalb Mall <=> Belvedere via Church St, Decatur Station, McDonough St, Midway Rd',
'123 DECATUR STATION' => 'N. DeKalb Mall <=> Belvedere via Church St, Decatur Station, McDonough St, Midway Rd',
'123 NORTH DEKALB MALL' => 'N. DeKalb Mall <=> Belvedere via Church St, Decatur Station, McDonough St, Midway Rd',
'124 DORAVILLE STA' => 'Tucker to Doraville via Chamblee-Tucker, Tucker-Norcross Rd, Pleasantdale, Oakcliff Rd',
'124 DORAVILLE STATION VIA BUTTON GWINETT' => 'Tucker to Doraville via Chamblee-Tucker, Tucker-Norcross Rd, Pleasantdale, Oakcliff Rd',
'124 PLEASANTDALE VIA BUTTON GWINETT' => 'Doraville to Tucker via Oakcliff Rd, Pleasantdale, Tucker-Norcross Rd, Chamblee-Tucker Rd',
'124 PLEASANTDALE-CHMBLE-TUCKR' => 'Doraville to Tucker via Oakcliff Rd, Pleasantdale, Tucker-Norcross Rd, Chamblee-Tucker Rd',
'125 HENDERSON MILL' => 'Kensington to N. Lake Mall via N. Decatur, GSU Clarkston, Montreal Rd',
'125 KENSINGTON STATION' => 'N. Lake to Kensington Station via Montreal Rd, GSU Clarkston, N. Decatur',
'125 NORTHLAKE PKWY' => 'Kensington to N. Lake Mall via N. Decatur, GSU Clarkston, Montreal Rd',
'126 CHAMBLEE STA VIA S FLOWERS' => 'N. Lake to Chamblee Station via Henderson Mill, Mercer Univ., Chamblee-Tucker',
'126 CHAMBLEE STATION VIA CHAMBLEE-TUCKER' => 'N. Lake to Chamblee Station via Henderson Mill, Mercer Univ., Chamblee-Tucker',
'126 CHAMBLEE STATION VIA PRES PKWY' => 'N. Lake to Chamblee Station via Henderson Mill, Mercer Univ., Chamblee-Tucker',
'126 N LAKE MALL VIA CHAMBLEE-TUCKER' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'126 N LAKE MALL VIA PRES PKWY' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'126 N LAKE MALL VIA S FLOWERS' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'13 FAIR ST.' => 'West Lake <=> Five Points via Mozley Park, Fair St, Atlanta Univ Ctr, Castleberry Hill',
'132 CHAMBLEE STA' => 'Dunwoody Club to Chamblee Station via Tilly Mill, GSU Dunwoody, N. Peachtree, Chamblee City Hall',
'132 TILLY MILL / DUNWOODY CLUB' => 'Chamblee to Dunwoody Club via Chamblee City Hall, N. Peachtree, Tilly Mill, GSU Dunwoody',
'140 NORTH POINTE/MANSELL P/R-WINDWARD PKWY' => 'N. Springs to Windward/N Pt via Mansell P/R, North Point Mall, North Pt Pkwy',
'140 NORTH SPRINGS STATION' => 'North Point to North Springs Station via North Point Mall, Mansell P/R',
'141 MANSELL P& R/HAYNES BRIDGE RD/WINDWARD P&R' => 'N. Springs to Windward/Haynes Br via SR-9, North Point Mall, Mansell P/R',
'141 MANSELL P& R/WINDWARD P&R VIA DEERFIELD WEBB RD' => 'N. Springs to Windward/Haynes Br via SR-9, North Point Mall, Mansell P/R',
'141 NORTH SPRINGS STATION' => 'Alpharetta to North Springs Station via SR-9, North Point Mall, Mansell P/R',
'141 NORTH SPRINGS STATION VIA DEERFIELD WEBB RD' => 'Alpharetta to North Springs Station via SR-9, North Point Mall, Mansell P/R',
'143 N. SPRINGS STA' => 'Windward to North Springs Express',
'143 N. SPRINGS STA VIA DEERFIELD PKWY. & WEBB RD.' => 'Windward to North Springs Express',
'143 N. SPRINGS STA VIA MORRIS RD. & ONE VERIZON PL.' => 'Windward to North Springs Express',
'143 WINDWARD P/R' => 'North Springs to Windward Express',
'143 WINDWARD P/R VIA DEERFIELD PKWY. & WEBB RD.' => 'North Springs to Windward Express',
'143 WINDWARD P/R VIA MORRIS RD. & ONE VERIZON PL.' => 'North Springs to Windward Express',
'148 Sandy Springs' => 'Riveredge to Sandy Springs Station via Mt Vernon',
'148-Sandy Springs/Riveredge Pkwy' => 'Sandy Springs to Riveredge Pkwy via Mt Vernon',
'15 DECATUR STA' => 'Anvil Block/River Rd to Decatur Station via S. DeKalb Mall, Candler Rd, Agnes Scott',
'15 DECATUR STA VIA S. DEKALB MALL' => 'Anvil Block/River Rd to Decatur Station via S. DeKalb Mall, Candler Rd, Agnes Scott',
'15 DECATUR STATION' => 'Anvil Block/River Rd to Decatur Station via S. DeKalb Mall, Candler Rd, Agnes Scott',
'15 S. DEKALB - ANVIL BLOCK VIA PERIMETER COLL. & S. DEKALB MALL' => 'Decatur to Anvil Block OR Linecrest Rd via Agnes Scott, Candler Rd, S. DeKalb Mall',
'15 S. DEKALB - LINECREST' => 'Decatur to Anvil Block OR Linecrest Rd via Agnes Scott, Candler Rd, S. DeKalb Mall',
'15 S. DEKALB - PERIMETER COLL.' => 'Decatur to Anvil Block OR Linecrest Rd via Agnes Scott, Candler Rd, S. DeKalb Mall',
'150 DUNWOODY STA' => 'Dunwoody Village to Dunwoody Station via Mt Vernon, Ashford-Dunwoody, Perimeter Center Pkwy',
'150 PERIMETER CTR/DUNWOODY CLUB' => 'Dunwoody Station to Dunwoody Village via Perimeter Center Pkwy, Ashford-Dunwoody, [Mt Vernon]',
'150 PERIMETER CTR/DUNWOODY VILLAGE' => 'Dunwoody Station to Dunwoody Village via Perimeter Center Pkwy, Ashford-Dunwoody, [Mt Vernon]',
'153 H E HOLMES STA' => 'Browntown Rd to HE Holmes Station via J. Jackson Pkwy, Holmes Dr, F. Douglass High School',
'153 H E HOLMES-BROWNTOWN' => 'HE Holmes to Browntown Rd via F. Douglass High School, Holmes Dr, J. Jackson Pkwy',
'155 GA STATE STA VIA FIVE PTS STA / GRADY HOSP' => 'Polar Rock to GA State Station via Windsor St, Forsyth St, Five Points',
'155 POLAR ROCK VIA FIVE PTS/WINDSOR' => 'GA State to Polar Rock via Five Points, Forsyth St, Windsor St, Lakewood Ave',
'16 NOBLE- DOWNTOWN' => 'Executive Park to Five Points via Briarcliff, VA Highland, Carter Ctr, Ralph McGill',
'16 NOBLE-EXECUTIVE PARK VIA VIRGINIA HIGHLAND-CARTER CTR' => 'Five Points to Executive Park via Ralph McGill, Carter Ctr, VA Highland, Briarcliff',
'162 HEADLAND DR / ALISON CT' => 'Oakland City to N. Camp Creek Pkwy via Campbellton, Stanton, Alison Ct, Headland Dr, Greenbriar Mall',
'162 HEADLAND DR / ALISON CT VIA N CAMP CK' => 'Oakland City to N. Camp Creek Pkwy via Campbellton, Stanton, Alison Ct, Headland Dr, Greenbriar Mall',
'162 OAKLAND CITY STATION' => 'N. Camp Creek Pkwy to Oakland City Station via Greenbriar Mall, Headland Dr, Alison Ct, Stanton, Campbellton Rd',
'162 OAKLAND CITY STATION VIA N CAMP CK' => 'N. Camp Creek Pkwy to Oakland City Station via Greenbriar Mall, Headland Dr, Alison Ct, Stanton, Campbellton Rd',
'165 FAIRBURN RD / BARGE RD P/R' => 'HE Holmes to Barge Rd P/R via Fairburn Rd',
'165 HAMILTON E. HOLMES STA' => 'Barge Rd P/R to HE Holmes Station via Fairburn Rd',
'170 BROWNLEE ROAD / PEYTON' => 'HE Holmes to Benjamin E Mays Dr via MLK Dr, Peyton Rd, Lynhusrt Dr',
'170 BROWNLEE ROAD VIA BE MAYS' => 'HE Holmes to Benjamin E Mays Dr via MLK Dr, Peyton Rd, Lynhusrt Dr',
'170 HAMILTON E HOLMES STATION' => 'Brownlee Rd to HE Holmes Station  via MLK Dr, Peyton Rd',
'172 COLLEGE PARK STATION' => 'Oakland City to College Park Station via Sylvan Rd, Hapeville, Virginia Ave',
'172 OAKLAND CITY STATION' => 'College Park to Oakland City Station via Virginia Ave, Hapeville, Sylvan Rd',
'178 EMPIRE BLVD / SOUTHSIDE IND PKWY' => 'Lakewood to Southside Indus. via Macon Dr, Browns Mill Rd',
'178 LAKEWOOD STATION' => 'Southside Indus. to Lakewood Station via Hapeville Rd, Macon Dr',
'178 OLD HAPEVILLE RD / CLEVELAND AVE' => 'Lakewood to Southside Indus. via Macon Dr, Browns Mill Rd',
'180 COLLEGE PARK STA' => 'Palmetto to College Park via Roosevelt Hwy, Fairburn, Union City, Washington Rd, Camp Creek Pkwy',
'180 PALMETTO- VIA FAIRBURN' => 'College Park to Palmetto via Camp Creek Pkwy, Washington Rd, Roosevelt Hwy, Union City, Fairburn',
'180 TO STONEWALL TELL & CAMP RD' => 'College Park to Palmetto via Camp Creek Pkwy, Washington Rd, Roosevelt Hwy, Union City, Fairburn',
'181 COLLEGE PARK STATION VIA SOUTH FULTON' => 'Fairburn to East Point Station via Roosevelt Hwy, Beverly Engram, Buffington Rd, GICC',
'181 FAIRBURN VIA BANK OF AMERICA' => 'East Point to Fairburn via GICC, Buffington Rd, Beverly Engram, Roosevelt Hwy',
'181 SOUTH FULTON PARK RIDE BUFFINGTON RRD.' => 'College Park to Fairburn via GICC, Buffington Rd, Beverly Engram, Roosevelt Hwy',
'183 BARGE RD/ COUNTY LINE / BARGE RD PARK/RIDE' => 'Lakewood to Barge Rd P/R via Greenbriar Mall, Campbellton Rd, County Line',
'183 BARGE RD/LAKEWOOD LAKEWOOD STA' => 'Barge Rd P/R to Lakewood Station via Greenbriar Mall',
'185-HOLCOMB BRIDGE RD./ALPHARETTA HWY/OLD MILTON PWKY.' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU//185',
'185-HOLCOMB BRIDGE RD./VIA MARKET BLVD.' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU//185',
'186 DOWNTOWN' => 'E Wesley Chapel to Five Points via Snapfinger Woods, Rainbow Dr, S. DeKalb Mall, GA State Station',
'186 DOWNTOWN VIA EASTSIDE DR' => 'E Wesley Chapel to Five Points via Snapfinger Woods, Rainbow Dr, S. DeKalb Mall, GA State Station',
'186 RAINBOW VIA PLEASANTWOOD DR.' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'186 RAINBOW/E.WESLEY' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'189  S. FULTON P/R VIA HILLANDALE' => 'College Park to S. Fulton P/R via GICC, Old Natl Hwy, Scofield Rd, Flat Shoals Rd',
'189 COLLEGE PARK STATION' => 'S. Fulton P/R to College Park via Flat Shoals Rd, Scofield Rd, Old Natl Hwy, GICC',
'189 COLLEGE PK STA VIA CADIZ' => 'S. Fulton P/R to College Park via Flat Shoals Rd, Scofield Rd, Old Natl Hwy, GICC',
'189 COLLEGE PK STA VIA HILLANDALE' => 'S. Fulton P/R to College Park via Flat Shoals Rd, Scofield Rd, Old Natl Hwy, GICC',
'189 S. FULTON P/R VIA CADIZ' => 'College Park to S. Fulton P/R via GICC, Old Natl Hwy, Scofield Rd, Flat Shoals Rd',
'19 CLAIRMONT - CHAMBLEE STA' => 'Decatur to Chamblee Station via Clairmont Rd, VA Hospital, Toco Hills, Plaza Fiesta, PDK Airport',
'19 CLAIRMONT - DECATUR STA' => 'Chamblee to Decatur Station via Clairmont Rd, PDK Airport, Plaza Fiesta, Toco Hills, VA Hospital',
'19 CLAIRMONT - DECATUR STA VIA HLTH CTR' => 'Chamblee to Decatur Station via Clairmont Rd, PDK Airport, Plaza Fiesta, Toco Hills, VA Hospital',
'19 DECATUR STATION' => 'Chamblee to Decatur Station via Clairmont Rd, PDK Airport, Plaza Fiesta, Toco Hills, VA Hospital',
'19 VA HOSPITAL' => 'Decatur to Chamblee Station via Clairmont Rd, VA Hospital, Toco Hills, Plaza Fiesta, PDK Airport',
'191 HARTSFEILD S E VIA FLINT RIVER' => 'Clayton Justice Ctr to College Park via Flint River/SR138, Riverdale P/R, GA-85, Airport (Intl)',
'191 JUSTICE CENTER VIA FLINT RIVER' => 'College Park to Clayton Justice Ctr via Airport (Intl), GA-85, Riverdale P/R, Flint River/GA-138',
'192 JUSTICE CENTER  VIA TARA BLVD' => 'Old Dixie to Clayton Justice Ctr via Tara Blvd',
'192 OLD DIXIE AT FOREST PARKWAY VIA TARA BLVD' => 'Clayton Justice Ctr to Old Dixie Rd via Tara Blvd',
'193 EAST POINT STAT VIA JONESBORO/138' => 'Clayton Justice Ctr to East Point Station via Jonesboro Rd, Clayton State Univ., Forest Park, Hapeville',
'193 EAST POINT STAT VIA TARA BLVD' => 'Clayton Justice Ctr to East Point Station via Jonesboro Rd, Clayton State Univ., Forest Park, Hapeville',
'193 JUSTICE CENTER VIA JONESBORO/138' => 'East Point to Clayton Justice Ctr via Hapeville, Forest Park, Clayton State Univ., Jonesboro Rd',
'193 JUSTICE CENTER VIA TARA BLVD' => 'East Point to Clayton Justice Ctr via Hapeville, Forest Park, Clayton State Univ., Jonesboro Rd',
'194 EAST POINT VIA MORELAND AVE' => 'Clayton Justice Ctr to East Point Station via Tara Blvd, Southlake Mall, Moreland Ave, Conley Rd, Hapeville',
'194 JUSTICE CENTER VIA MORELAND AVE' => 'East Point to Clayton Justice Ctr via Hapeville, Conley Rd, Moreland Ave, Southlake Mall, Tara Blvd',
'195 ANVIL BLOCK' => 'College Park to Anvil Block Rd via GICC, Roosevelt Hwy, Forest Park, Forest Pkwy',
'195 COLLEGE PARK STAT SOUTH' => 'Anvil Block Rd to College Park via Forest Pkwy, Forest Park, Roosevelt Hwy, GICC',
'196 COLLEGE PARK STATION' => 'Southlake Mall to College Park Station via Mt Zion, Upper Riverdale, Riverdale P/R, GA-85',
'196 RIVERDALE PARK & RIDE' => 'College Park to Southlake Mall via GA-85, Riverdale P/R, Upper Riverdale, Mt Zion',
'196 SOUTHLAKE MALL UPPER RIVERDALE MT ZION' => 'College Park to Southlake Mall via GA-85, Riverdale P/R, Upper Riverdale, Mt Zion',
'2 DECATUR STATION VIA NORTH AVE' => 'North Ave to Decatur Station via North Ave, Ponce City Market, Fernbank Museum',
'2 NORTH AVE STATION VIA NORTH AVE' => 'Decatur to North Ave Station via W. Ponce, Fernbank Museum, Ponce City Market, North Ave',
'201 SIX FLAGS HOLMES STA' => 'Six Flags to HE Holmes (Seasonal)',
'201 SIX FLAGS SIX FLAGS PARK' => 'HE Holmes to Six Flags (Seasonal)',
'21 MEMORIAL DR - GA STATE STATION' => 'Kensington to GA State Station via Memorial Dr, Belvedere Plaza, East Lake Golf Club, Oakland Cemetery, King Memorial Station',
'21 MEMORIAL DR - KENSINGTON STA' => 'GA State to Kensington Station via Memorial Dr, Oakland Cemetery, East Lake Golf Club, Belvedere Plaza',
'21 MEMORIAL DR -GEORGIA STATE STATION' => 'Kensington to GA State Station via Memorial Dr, Belvedere Plaza, East Lake Golf Club, Oakland Cemetery, King Memorial Station',
'21 MEMORIAL DR- CRIM HIGH' => 'GA State to Kensington Station via Memorial Dr, Oakland Cemetery, East Lake Golf Club, Belvedere Plaza',
'221 LIMITED KENSINGTON STA' => 'Memorial Dr to Kensington Station Ltd via Memorial Dr, GSU Clarkston (Limited stops)',
'221 LIMITED MEMORIAL DR CENTRAL AVENUE P/R' => 'Kensington to Memorial Dr P/R Ltd via Memorial Dr, GSU Clarkston,  N. Hairston Rd (Limited stops)',
'24 - CANDLER PARK STATION' => 'Indian Creek to Candler Park Station via Glenwood, McAfee, Hosea Williams Dr, Kirkwood',
'24 - CANDLER PARK STATION VIA GREEN FORREST' => 'Indian Creek to Candler Park Station via Glenwood, McAfee, Hosea Williams Dr, Kirkwood',
'24 - INDIAN CREEK STATION' => 'Candler Park to Indian Creek Station via Hosea Williams Dr, Kirkwood, McAfee, Glenwood',
'24 - INDIAN CREEK STATION VIA GLENDALE' => 'Candler Park to Indian Creek Station via Hosea Williams Dr, Kirkwood, McAfee, Glenwood',
'25 DORAVILLE STA' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'25 LENOX STA' => 'Doraville/Medical Ctr to Lenox Station via Oglethorpe Univ., Brookhaven',
'25 MEDICAL CENTER STA' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'26 NORTH AVE STA CARVER HILLS VIA BANKHEAD STA' => 'Perry Blvd to North Ave Station via Bankhead Station, North Ave',
'26 NORTH AVE STATION VIA BANKHEAD STA' => 'Perry Blvd to North Ave Station via Bankhead Station, North Ave',
'26 PERRY BLVD BANKHEAD STA VIA CARVER HILLS' => 'North Ave to Perry Blvd via North Ave, Bankhead Station',
'26 PERRY BLVD VIA BANKHEAD STA' => 'North Ave to Perry Blvd via North Ave, Bankhead Station',
'27 CHESHIRE BRDG / LINDBERGH STA' => 'Midtown to Lindbergh Station via Bot. Gardens, Ansley Mall, Cheshire Br.',
'27 CHESHIRE BRDG / MIDTOWN STA' => 'Lindbergh to Midtown Station via Cheshire Br., Ansley Mall, Bot. Gardens',
'3 John Wesley Dobbs -  H.E.HOLMES STA Via Barfield Loop' => 'MLK Center to HE Holmes Station via Five Pts, Atlanta Univ. Ctr, Fair St, Mozley Park',
'3 John Wesley Dobbs - H.E.HOLMES STA' => 'MLK Center to HE Holmes Station via Five Pts, Atlanta Univ. Ctr, Fair St, Mozley Park',
'3 John Wesley Dobbs - John Wesley Dobbs via Five Points' => 'HE Holmes to MLK Center via Fair St, Mozley Park, Atlanta Univ. Ctr, Five Pts, Auburn Ave',
'3 John Wesley Dobbs Ave.- via Barfield Loop via Five Points' => 'HE Holmes to MLK Center via Fair St, Mozley Park, Atlanta Univ. Ctr, Five Pts, Auburn Ave',
'30 LAVISTA RD-NORTHLAKE' => 'Lindbergh to N. Lake Mall via LaVista, Toco Hills, Lakeside',
'30 LINDBERGH STA' => 'N. Lake to Lindbergh Station via LaVista, Lakeside, Toco Hills',
'32 BOULDERCREST' => 'Five Pts to Bouldercrest via Capitol, Zoo Atlanta, Confederate Ave',
'32 BOULDERCREST - FIVE POINTS STATION' => 'Bouldercrest to Five Points via Confederate Ave, Zoo Atlanta, Capitol',
'33 BRIARCLIFF RD - CHAMBLEE STA' => 'Lenox to Chamblee Station via Executive Park, Briarcliff, I-85 Access Rd, Chamblee-Tucker',
'33 BRIARCLIFF RD - LENOX STA' => 'Chamblee to Lenox Station via Chamblee-Tucker, I-85 Access Rd, Briarcliff, Executive Park',
'34 - CLIFTON SPRINGS HEALTH SPRINGS' => 'East Lake to GSU-Decatur via 2nd Ave, Gresham Rd, Clifton Springs',
'34 - EAST LAKE STATION' => 'GSU-Decatur to East Lake Station via Cliftpon Springs, Gresham Rd, 2nd Ave',
'34 - EAST LAKE STATION VIA GA STATE' => 'GSU-Decatur to East Lake Station via Cliftpon Springs, Gresham Rd, 2nd Ave',
'34 - GA STATE' => 'East Lake to GSU-Decatur via 2nd Ave, Gresham Rd, Clifton Springs',
'36 GRADY HIGH SCH' => 'Midtown to Decatur Station via VA Highland, Emory, DeKalb Medical',
'36 MIDTOWN STA' => 'Decatur to Midtown Station via DeKalb Med, Emory, VA Highland',
'36 N DECATUR / VA HIGHLAND - DECATUR STATION' => 'Midtown to Decatur Station via VA Highland, Emory, DeKalb Medical',
'36 N DECATUR / VA HIGHLAND- MIDTOWN STA' => 'Decatur to Midtown Station via DeKalb Med, Emory, VA Highland',
'37 DEFOORS FERRY / ATLANTIC STATION-ARTS CTR STA' => 'Moores Mill Shop. Ctr to Arts Center Station via Defoors Ferry, Bellemeade Ave, Atlantic Station',
'37 DEFOORS FERRY / ATLANTIC STATION-MARIETTA BLVD' => 'Arts Center to Moores Mill Shop. Ctr via Atlantic Station, Bellemeade Ave, Defoors Ferry',
'39 BUFORD HWY - DORAVILLE STA' => 'Lindbergh to Doraville Station via Sydney Marcus Blvd, Buford Hwy, Corporate Square, Plaza Fiesta',
'39 BUFORD HWY - LINDBERGH STA' => 'Doraville to Lindbergh Station via Buford Hwy, Plaza Fiesta, Corporate Square, Sydney Marcus Blvd',
'4 INMAN PARK STA' => 'Thomasville to Inman Park Station via Forest Park Rd, Kipling St, Moreland Ave',
'4 INMAN PARK STA VIA ATL YOUTH ACADEMY' => 'Thomasville to Inman Park Station via Forest Park Rd, Kipling St, Moreland Ave',
'4 METRO TRANSITIONAL CENTER' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'4 METRO TRANSITIONAL CENTER VIA ATL YOUTH ACADEMY' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'4 METRO TRANSITIONAL CENTER VIA SWALLOW CIRCLE' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'42 PRYOR RD/ MCDANIEL ST-LAKEWOOD STATION' => 'Five Points to Lakewood Station via Mc Daniel St, Pryor Rd, Lakewood Amphitheater',
'42 PRYOR RD/ MCDANIEL ST-LAKEWOOD STATION VIA AMAL DR' => 'Five Points to Lakewood Station via Mc Daniel St, Pryor Rd, Lakewood Amphitheater',
'42 PRYOR RD/MCDANIEL ST-FIVE POINTS STATION' => 'Lakewood to Five Points Station via Lakewood Amphitheater, Pryor Rd, Mc Daniel St',
'42 PRYOR RD/MCDANIEL ST-FIVE POINTS STATION VIA AMAL DR' => 'Lakewood to Five Points Station via Lakewood Amphitheater, Pryor Rd, Mc Daniel St',
'47 I-85 ACCESS RD/BRIARWOOD RD - BROOKHAVEN' => 'Chamblee to Brookhaven Station via Shallowford, I-85 Access Rd, Briarwood',
'47 I-85 ACCESS RD/BRIARWOOD RD - CHAMBLEE' => 'Brookhaven to Chamblee Station via Briarwood, I-85 Access Rd, Shallowford',
'49 MCDONOUGH BLVD' => 'Five Points to Moreland/Woodland Ave via Pryor St, Pollard Blvd, Mc Donough Blvd',
'49 MCDONOUGH BLVD - FIVE PTS STATION' => 'Moreland/Woodland to Five Points via Custer Ave, Hill St, Pollard Blvd, Central Ave',
'5 LINDBERGH STA' => 'Dunwoody to Lindbergh Station via Hammond Dr, Roswell Rd, Buckhead, Piedmont Rd',
'5 SANDY SPRINGS - DUNWOODY STA' => 'Lindbergh to Dunwoody Station via Piedmont Rd, Buckhead, Roswell Rd, Hammond Dr',
'50 HOLLOWELL PWY' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'50 HOLLOWELL PWY BANKHEAD STA VIA DARNELL CTR' => 'Carroll Heights to Bankhead Station via Bolton Rd, Donald E. Hollowell Pkwy',
'50 HOLLOWELL PWY VIA CARROLL HGTS' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'50 HOLLOWELL PWY VIA CARROLL HGTS/DARNELL CTR' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'50 HOLLOWELL PWY-BANKHEAD STA' => 'Carroll Heights to Bankhead Station via Bolton Rd, Donald E. Hollowell Pkwy',
'51 BOONE BLVD / FIVE POINTS STA' => 'Joseph E. Boone to Five Points via Centennial Park, CNN',
'51 JOS E BOONE BLVD' => 'Five Pts to New Jersey Ave via CNN, Centennial Park, Joseph E. Boone Blvd',
'53 SKIPPER DR/W LAKE AVE' => 'West Lake to Skipper Dr via West Lake Ave, Baker Rd, Allegro Dr',
'53 SKIPPER DR/W LAKE AVE - W LAKE STA' => 'Skipper Dr to West Lake Station via Allegro Dr, Baker Rd, West Lake Ave',
'55 JONESBORO RD FIVE POINTS STATION' => 'Forest Park to Five Points via Jonesboro Rd, Mc Donough Blvd, Hank Aaron Dr',
'55 JONESBORO RD HUTCHENS  RD FOREST PKWY' => 'Five Points to Forest Park via Hank Aaron Dr, Mc Donough Blvd, Jonesboro Rd',
'55 JONESBORO RD- FIVE POINTS STATION' => 'Forest Park to Five Points via Jonesboro Rd, Mc Donough Blvd, Hank Aaron Dr',
'55 S ATLANTA HIGH VIA JONESBORO RD HUTCHENS  RD' => 'Five Points to Forest Park via Hank Aaron Dr, Mc Donough Blvd, Jonesboro Rd',
'56 COLLIER HGTS/ADAMSVILLE/PLAINVILLE' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry, [Wilson Mill or Boulder Park]',
'56 COLLIER HGTS/BOULDER PARK' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry, [Wilson Mill or Boulder Park]',
'56 COLLIER HGTS/BOULDER PARK VIA ALEX DR' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry, [Wilson Mill or Boulder Park]',
'56 H E HOLMES STATION' => 'Adamsville to HE Holmes Station via Wilson Mill, Bakers Ferry, Collier Rd, Burton Rd',
'56 H E HOLMES STATION VIA ALEX DR' => 'Adamsville to HE Holmes Station via Wilson Mill, Bakers Ferry, Collier Rd, Burton Rd',
'58 ATLANTA INDUSTRIAL/HOLLYWOOD RD' => 'Bankhead to Atlanta Industrial via Donald E. Hollowell Pkwy, Hollywood Rd, Northwest Dr',
'58 BANKHEAD STA' => 'Atlanta Industrial to Bankhead Station via Northwest Dr, Hollywood Dr, Donald E. Hollowell Pkwy',
'6 EMORY' => 'Lindbergh to Inman Park Station via LaVista, Emory, Briarcliff, Moreland',
'6 INMAN PARK STATION' => 'Lindbergh to Inman Park Station via LaVista, Emory, Briarcliff, Moreland',
'6 LINDBERGH STA - EMORY' => 'Inman Park to Lindbergh Station via Moreland, Briarcliff, Emory, LaVista',
'60 HAMILTON E. HOLMES STA' => 'Moores Mill Shop. Ctr to HE Holmes Station via Hollywood Rd, F. Douglass High School, Holmes Dr',
'60 MOORES MILL SHOPPING CTR' => 'HE Holmes to Moores Mill Shop. Ctr via Holmes Dr, F. Douglass High School, Hollywood Rd',
'66 LYNHURST / BE MAYS HS' => 'HE Holmes to Barge Rd P/R via Lynhurst Dr, Harbin Rd, Therell High School, Greenbriar Mall',
'66 LYNHURST / HAMILTON E. HOLMES STA' => 'Barge Rd P/R to HE Holmes Station via Greenbriar Mall, Therell High School, Harbin Rd, Lynhurst Dr',
'66 LYNHURST DR/ BARGE RD P/R' => 'HE Holmes to Barge Rd P/R via Lynhurst Dr, Harbin Rd, Therell High School, Greenbriar Mall',
'67 DIXIE HILLS / W LAKE STA' => 'West End to Dixie Hills via Lucile St, Westview Cemetery, West Lake Station',
'67 W LAKE / WEST END STA' => 'Dixie Hills to West End Station via West Lake Station, Westview Cemetery, Lucile St',
'67 WEST END / W LAKE STATION' => 'Dixie Hills to West End Station via West Lake Station, Westview Cemetery, Lucile St',
'68 DONNELLY TO ASHBY ST. STA. VIA WEST END STA.' => 'Lorraine/Granada to Ashby Station via Donnelly Ave, West End Station, Atlanta Univ. Ctr',
'68 DONNELLY TO S GORDON VIA WEST END STATION' => 'Ashby to Lorraine/Granada via Atlanta Univ. Ctr, West End Station, Beecher St',
'68 DONNELLY/BEECHER VIA WEST END STATION' => 'Ashby to Lorraine/Granada via Atlanta Univ. Ctr, West End Station, Beecher St',
'71 CASCADE-ASHLEY COURTS' => 'West End to [Ashley Ct OR Country Sq] via Abernathy Blvd, Cascade Rd, Cascade Springs Preserve, Cascade Crossing',
'71 CASCADE-COUNTRY SQUIRE' => 'West End to [Ashley Ct OR Country Sq] via Abernathy Blvd, Cascade Rd, Cascade Springs Preserve, Cascade Crossing',
'71 WEST END STA' => 'Ashley Ct/Country Sq to West End via Cascade Rd, Cascade Crossing, Cascade Springs Preserve, Abernathy Blvd',
'73 FULTON IND - LAGRANGE/BOAT ROCK' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'73 FULTON IND VIA WEST PARK' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'73 FULTON IND VIA WEST PARK & WENDELL LOOP' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'73 H E HOLMES STA VIA BAKERS FRY' => 'Boat Rock to HE Holmes Station via Fulton Industrial, Fulton Co Airport, Adamsville',
'73 H E HOLMES STA VIA WEST PARK' => 'Boat Rock to HE Holmes Station via Fulton Industrial, Fulton Co Airport, Adamsville',
'73 H E HOLMES STA VIA WEST PARK & WENDELL LOOP' => 'Boat Rock to HE Holmes Station via Fulton Industrial, Fulton Co Airport, Adamsville',
'74 FLAT SHOALS FIVE POINTS STA' => 'S. DeKalb Mall to Five Points via [Whites Mill or Battle Forest], Flat Schoals, East Atlanta Vlg',
'74 FLAT SHOALS VIA BATL FOREST RAINBOW WAY' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'74 FLAT SHOALS VIA WHITES MILL RAINBOW WAY' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'75 AVONDALE STA' => 'Tucker to Avondale Station via Tucker High School, Lawrenceville Hwy, N. DeKalb Mall, DeKalb Indus.',
'75 TUCKER' => 'Avondale to Tucker via DeKalb Indus., N. DeKalb Mall, Lawrenceville Hwy, Tucker High School',
'78 CLEVELAND AVE-EAST POINT STATION' => 'Browns Mill to East Point Station via Cleveland Ave',
'78 CLEVELAND AVENUE' => 'East Point to Browns Mill Park via Cleveland Ave, Jonesboro Rd',
'79 EAST POINT STATION SYLVAN HILLS' => 'Oakland City to East Point Station via Sylvan Rd, Springdale Rd, Jefferson Ave, Cleveland Ave',
'79 OAKLAND CITY STATION SYLVAN HILLS' => 'East Point to Oakland City Station via Cleveland Ave, Jefferson Ave, Springdale Rd, Sylvan Rd',
'8  - BROKHAVN STA' => 'Kensington to Brookhaven Station via N. DeKalb Mall, Toco Hills, Executive Park',
'8 - KENSINGTON STA' => 'Brookhaven to Kensington Station via Executive Park, Toco Hills, N. DeKalb Mall',
'800 JUSTICE CENTER' => 'Clayton Justice Ctr <=> Lovejoy via Tara Blvd (Flex Service)',
'81 VENETIAN / ADAMS PARK' => 'West End to Adams Park via Oglethorpe Ave, Lawton St, Westmont Rd, Venetian Hills',
'81 WEST END STA' => 'Adams Park to West End Station via Venetian Hills, Westmont Rd, Lawton St, Oglethorpe Ave',
'82 CAMP CREEK MARKET PLACE' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All Rd, Roosevelt Hwy',
'82 CAMP CREEK WELCOME ALL VIA CAMP CREEK MARKET PLACE' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All Rd, Roosevelt Hwy',
'82 CAMP CREEK WELCOME ALL VIA GA DOR' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All Rd, Roosevelt Hwy',
'82 COLLEGE PARK STATION' => 'Union City to College  Park via Roosevelt Ave, Welcome All Rd, Camp Creek Pkwy/Marketplace',
'82 COLLEGE PARK STATION VIA GA DOR' => 'Union City to College  Park via Roosevelt Ave, Welcome All Rd, Camp Creek Pkwy/Marketplace',
'82 COLLEGE PARK STATION VIA MARKET PLACE' => 'Union City to College  Park via Roosevelt Ave, Welcome All Rd, Camp Creek Pkwy/Marketplace',
'83 CAMPBELLTON TO GREENBRIAR/BARGE RD P/R' => 'Oakland City to Barge Rd P/R via Campbellton Rd, Adams Park, Greenbriar Mall',
'83 OAKLAND CITY STA' => 'Barge Rd P/R to Oakland City Station via Greenbriar Mall, Campbellton Rd, Adams Park',
'84 CAMP CREEK MARKET PLACE EAST POINT STATION' => 'Deerwood to East Point Station via Fairburn Rd, Camp Creek Marketplace, Mt Olive, Washington Rd',
'84 EAST POINT CAMP CREEK MARKET PL' => 'East Point to Deerwood via Washington Rd, Mt Olive, Camp Creek Marketplace, Fairburn Rd',
'84 EAST POINT CENTRE PARKWAY MARKET PLACE' => 'East Point to Deerwood via Washington Rd, Mt Olive, Camp Creek Marketplace, Fairburn Rd',
'84 EAST POINT STA' => 'Deerwood to East Point Station via Fairburn Rd, Camp Creek Marketplace, Mt Olive, Washington Rd',
'84 EAST POINT STATION CAMP CREEK MARKET PLACE' => 'Deerwood to East Point Station via Fairburn Rd, Camp Creek Marketplace, Mt Olive, Washington Rd',
'85 N. SPRINGS STA - VIA MANSELL RD' => 'Mansell P/R to N. Springs via Mansell Rd, Historic Roswell, Dunwoody Place',
'85 ROSWELL / MANSELL P/R' => 'N. Springs to Mansell P/R via Dunwoody Place, Historic Roswell, Mansell Rd',
'86 HILLANDALE DR & CROSSING PKWY VIA PEACHCREST/SNAPFINGER/FAIRINGTON  RD' => 'Kensington to Stonecrest Mall via Peachcrest Rd, Snapfinger Woods, Hillandale Rd',
'86 KENSINGTON STA. VIA PEACHCREST RD/SNAPFINGER/FAIRINGTON R' => 'Stonecrest Mall to Kensington Station via Hillandale Rd, Snapfinger Woods, Peachcrest Rd',
'86 KENSINGTON STA. VIA PEACHCREST RD/SNAPFINGER/FAIRINGTON RD' => 'Stonecrest Mall to Kensington Station via Hillandale Rd, Snapfinger Woods, Peachcrest Rd',
'86 STONECREST MALL VIA PEACHCREST/SNAPFINGER/FAIRINGTON RD.' => 'Kensington to Stonecrest Mall via Peachcrest Rd, Snapfinger Woods, Hillandale Rd',
'87 DUNWOODY STATION' => 'N. Springs/Dunwoody Pl. to Dunwoody Station via Roswell Rd, Hammond Dr',
'87 ROSWELL RD' => 'Dunwoody to N. Springs via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'87 ROSWELL RD/N SPRINGS STA' => 'Dunwoody to N. Springs via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'89 COLLEGE PARK STATION' => 'Shannon Square to College Park via Jonesboro Rd, Old Natl Hwy, Sullivan Rd, Best Rd',
'89 OLD NATIONAL HWY UNION STATION' => 'College Park to Shannon Square via Best Rd, Sullivan Rd, Old Natl Hwy, Jonesboro Rd',
'9 - CANDLER AT RAINBOW' => 'Inman Park to S. DeKalb Mall via East Atl Vlg, Brannen Rd, Tilson Rd',
'9 E. ATL/TILSON/CANDLER -INMAN PARK STA SOUTH LOOP' => 'S. DeKalb Mall to Inman Park Station via Tilson Rd, Brannen Rd, East ATL Vlg',
'93 EAST PT STA VIA DELOWE DR' => '93 EAST PT STA VIA DELOWE DR',
'93 EAST PT STA VIA NORMAN BERRY DR' => '93 EAST PT STA VIA NORMAN BERRY DR',
'95 ATL AREA TECH METRO COLL' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'95 METROPOLITAN PARKWAY-HAPEVILLE' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'95 WEST END STATION' => 'Hapeville to West End Station via King Arnold St, Metropolitan Pkwy, Atlanta Tech College',
'99 BOULEVARD MONROE- NORTH AVE STATION VIA KING MEM' => 'GA State to North Ave Station via King Mem, MLK Center, Boulevard, North Ave',
'99 BOULEVARD/MONROE/GA STATE STA' => 'North Ave to GA State Station via Boulevard, MLK Center, Sweet Auburn',
*/
);

$mergeableScheduleRoutes = [
	// North Point Mall/North Springs
	["140", "141"], // North Point Nall

	// Dunwoody
	["5", "87"], // Hammond Drive sector 902665/903199

	// Chamblee
	["33", "126"], // Chamblee Tucker sector 905353 /905589
	
	// Brookhaven
	["8", "47"], // N Druid Hills 905959/905960

	// Lenox
	["25", "110"], // Lenox Mall sector

	// Lindbergh
	["6", "27", "30"], // Lindbergh Drive sector. 900611/900612
	["6", "30"], // La Vista sector + highlighting.

	// Midtown
	["36", "109"], // 10th street sector

	// North Ave	
	["2", "102"], // Ponce de Leon sector, +highlighting
	["2", "99"], // North Ave Sector
	["1", "26"], // North Ave sector

	// Oakland
	["83", "162"], // Cmpbellton read_exif_data
	
	// Lakewood
	["42", "178"], // Lakewood Ave
	
	// East Point
	["78", "79"],
	
	// College Park
	//["82", "180"], // Camp Creek
	["181", "189", "195"], // Roosevelt Hwy 176158/166204
	
	// HE Holmes
	["60", "163"], // Holmes Dr 900905/903850
	["56", "165"], // Burton Rd 904118/904083
	["170", "66", "73"], // MLK Drive 901273/900880
	
	// West Lake
	["13", "53"], // West Lake Dr sector 904618/904617
	
	// Bankhead
	["50", "58"], // 905159/904384
	
	// Inman Pk	
	["4", "34", "107"], // Moreland Ave sector
	
	// Avondale
	["36", "120"], // East Ponce de Leon sector
	
	// Kensington
	//["121", "221"], // Memorial Dr sector 211710/121011
	["9", "21"], //# 901431
	["9", "107"], // 904570
	
	// Indian Creek	
	["115", "116", "119"], // Indian Creek 903386/903387

	// Misc
	["86", "111"], // Mall at Stonecrest 134092/134090
	
	["192", "193", "194"], // Tara blvd near Clayton Justice 272474/212482
	
];

function shouldSchedulesBeGrouped(array $routeList) {
	global $mergeableScheduleRoutes;
	$routeCount = count($routeList);
	
	foreach ($mergeableScheduleRoutes as $mergeableRoutes) {
		if ($routeCount == count($mergeableRoutes)) {
			
			$allRoutesPresent = true;
			foreach ($routeList as $r) {
				if (!in_array($r, $mergeableRoutes)) {
					$allRoutesPresent = false;
				}
			}
			if ($allRoutesPresent) return true;
		}		
	}
	return false;
}

function createMergedSchedules(array $stopSchedules) {
	$groupedSchedules = array();

	// get list of routes	
	$routeList = getRouteList($stopSchedules);
	$canMerge = shouldSchedulesBeGrouped($routeList);
	
	if (!$canMerge) return $stopSchedules;

	foreach ($stopSchedules as $ss) {
			$finalDestination = $ss['finalDestination'];
			$direction2 = $ss['direction2'];
			$routeName = $ss['name'];
			
			$groupedSch = (array_key_exists($finalDestination, $groupedSchedules) ? $groupedSchedules[$finalDestination] : null);
			if ($groupedSch == null) {
				//foreach($routes as $r) {
				//	if ($r['id'] == $routeId) {
						$groupedSchedules[$finalDestination] = $ss; //createRouteParams($r);				
						$groupedSchedules[$finalDestination]['direction2'] = $direction2;
						$groupedSchedules[$finalDestination]['finalDestination'] = $finalDestination;
				//		break;
				//	}
				//}
			}

			//foreach($routes as $r) {
			//	if ($r['id'] == $routeId) {
					$groupedSchedules[$finalDestination]['routes'][$routeName] = $routeName; // [$r['shortName']] = $r['shortName'];
					if (count($groupedSchedules[$finalDestination]['routes']) > 1) {
						$groupedSchedules[$finalDestination]['direction2'] = " to " . $finalDestination;					
					}
			//	}
			//}


			$groupedSchedules[$finalDestination]['wkday'] = array_merge($groupedSchedules[$finalDestination]['wkday'], $ss['wkday']);
			sort($groupedSchedules[$finalDestination]['wkday']);
			$groupedSchedules[$finalDestination]['sat'] = array_merge($groupedSchedules[$finalDestination]['sat'], $ss['sat']);
			sort($groupedSchedules[$finalDestination]['sat']);
			$groupedSchedules[$finalDestination]['sun'] = array_merge($groupedSchedules[$finalDestination]['sun'], $ss['sun']);
			sort($groupedSchedules[$finalDestination]['sun']);

			
			//$groupedSchedules[$finalDestination][$day] = array_merge($groupedSchedules[$finalDestination][$day], $schedule);
			//sort($groupedSchedules[$finalDestination][$day]);
		
	}
	
	return $groupedSchedules;
}

function getRouteList($stopSchedules) {
	$result = array();

	foreach ($stopSchedules as $ss) {
		$routeName = $ss['name'];
		
		if (!in_array($routeName, $result)) {
			array_push($result, $routeName);
		}
	}	
	return $result;
}

?>