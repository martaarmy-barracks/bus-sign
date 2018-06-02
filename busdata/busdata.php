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
'Route 1 Marietta Blvd' => 'North Ave to Moores Mill Shop. Ctr via Centennial Park, Westside Provisions, Chattahoochee Ave/Marietta Blvd',
'Route 1 North Ave Station' => 'Moores Mill Shop. Ctr to North Ave Station via Chattahoochee Ave/Marietta Blvd, Westside Provisions, Centennial Park',
'Route 102- North Avenue Station' => 'North Ave Station',
'Route 102-Edgewood/Candler Park Station' => 'Candler Park Station',
'Route 103 - Chamblee Station' => 'Winters Chapel to Chamblee Station via Peeler Rd, N. Shallowford, Peachtree Indus.',
'Route 103 - Wniter Chapel Rd' => 'Chamblee to Winters Chapel via Peachtree Indus., N. Shallowford, Peeler Rd',
'Route 104 - Doraville Station' => 'Winters Chapel to Doraville Station via New Peachtree',
'Route 104 - Tilly Mill Road' => 'Doraville Station to Winters Chapel via New Peachtree, Woodwin Rd',
'Route 107 - Inman Park Station' => 'Kensington to Inman Park Station via Covington Hwy, Glenwood Ave, East Atlanta Village, Moreland Ave',
'Route 107 - Kensington Station' => 'Inman Park to Kensington Station via Moreland Ave, East Atlanta Village, Glenwood Ave, Covington Hwy',
//'Monroe Drive/Boulevard' => 'Midtown &hArr; GA State Station via 10th St, Monroe Dr, Boulevard, Edgewood Ave',
'Route 109-Midtown Station' => 'Midtown Station',
'Route 109- Georgia State Station' => 'GA State Station via Edgewood Ave',
'Route - 110 Lenox Station' => 'Lenox Station',
'Route 110 - Lenox Station' => 'Lenox Station',
'Route 110-Arts Center Station' => 'Arts Center Station',
'Route 111 - Indian Creek Station' => 'Stonecrest Mall to Indian Creek via Hillandale Rd, Snapfinger Woods, Wesley Chapel, S. Indian Creek',
'Route 111 - Stone Crest Mall' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'Route 111 - Stonecrest Mall' => 'Indian Creek to Stonecrest Mall via S. Indian Creek, Wesley Chapel, Snapfinger Woods, Hillandale Rd',
'Route 114 - Avondale Station' => 'GSU Decatur to Avondale Station via Columbia High School, Eastgate Shop. Ctr, Columbia Dr',
'Route 114 - GA State University/Perimeter College' => 'Avondale to GSU Decatur via Columbia Dr, Eastgate Shop. Ctr, Columbia High School',
'Route 115- Indian Creek Station' => 'Lithonia Plaza to Indian Creek via Covington Hwy, S. Hairston Rd',
'Route 115- Main Street/Swift Street' => 'Indian Creek to Lithonia Plaza via S. Hairston Rd, Covington Hwy',
'Route 116 - Indian Creek Station' => 'Stonecrest Mall to Indian Creek via Lithonia Plaza, Redan Rd',
'Route 116 - Stonecrest Mall' => 'Indian Creek to Stonecrest Mall via Redan Rd, Lithonia Plaza',
'Route 117 - GRTA Park & Ride' => 'Avondale to Panola P/R via Rockbridge Rd, Panola Rd, Fairington Pkwy',
'Route 117- Avondale Station' => 'Panola P/R to Avondale Station via Panola Rd, Rockbridge Rd',
'Route 117 - Kensington Station' => 'Panola P/R to Avondale Station via Panola Rd, Rockbridge Rd',
'Route 119- Kensington Station' => 'Memorial Dr to Kensington Station via N./S. Hairston Rd, Redan Rd, Indian Creek Station, Kensington Rd',
'Route 119- Memorial Drive Park -Ride' => 'Kensington to Memorial Dr P/R via Kensington Rd, Indian Creek Station, Redan Rd, S./N. Hairston Rd',
'Route 12 - Cumberland Mall' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
// Careful, the headsign below is used by MARTA for BOTH #12 northbound AND southbound trips.
'Howell Mill Rd/Cumberland' => 'AMBIGUOUS',
'Route 12 - Midtown Station' => 'Cumberland Mall to Midtown Station via Northside Pkwy, Howell Mill, 10th St',
'Route 12 North Atlanta High School' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'Route 12 Paces Pavilion' => 'Midtown to Cumberland Mall via 10th St, Howell Mill, Northside Pkwy',
'Route 120 - Avondale Station' => 'Tucker to Avondale Station via Mountain Indus., E. Ponce, DeKalb Farmers Mkt',
'Route 120 - Greer Circle/Mountian Industrial Boulevard' => 'Avondale to Tucker via DeKalb Farmers Mkt, E. Ponce, Mountain Indus.',
'Route 121 - Kensington Station' => 'Mountain Indus. to Kensington Station via N. Hairston Rd, GSU Clarkston, Memorial Dr',
'Route 121- Memorial Drive Park-Ride' => 'Kensington to Mountain Indus. via Memorial Dr, GSU Clarkston, N. Hairston Rd',
'Route 121 Flintstone Dr' => 'Kensington to Mountain Indus. via Memorial Dr, GSU Clarkston, N. Hairston Rd',
'Route 121 N. Royal Dr.' => 'Kensington to Mountain Indus. via Memorial Dr, GSU Clarkston, N. Hairston Rd',
'Route 123 - East Lake Station' => 'N. DeKalb Mall to East Lake Station via Church St, DeKalb Med., W. Howard Ave',
'Route 123 - North DeKalb Mall' => 'East Lake to N. DeKalb Mall via W. Howard Ave, Church St, DeKalb Med.',
'Route 124 - Doraville Station' => 'Tucker to Doraville via Chamblee-Tucker, Tucker-Norcross Rd, Pleasantdale, Oakcliff Rd',
'Route 124 Lawrenceville HIghway' => 'Doraville to Tucker via Oakcliff Rd, Pleasantdale, Tucker-Norcross Rd, Chamblee-Tucker Rd',
'Route 125 - Kensington Station' => 'N. Lake to Kensington Station via Montreal Rd, GSU Clarkston, N. Indian Creek Dr',
'Route 125 - Northlake Mall' => 'Kensington to N. Lake Mall via N. Indian Creek Dr, GSU Clarkston, Montreal Rd',
'Route 126 - Chamblee Station' => 'N. Lake to Chamblee Station via Henderson Mill, Mercer Univ., Chamblee-Tucker',
'Route 126 - Parklake Dr' => 'Chamblee to N. Lake Mall via Chamblee-Tucker, Mercer Univ., Henderson Mill',
'Route 13 - Five Points Station' => 'West Lake to Five Points via Mozley Park, Fair St, Atlanta Univ Ctr, Castleberry Hill',
'Route 13 - West Lake Station' => 'Five Points to West Lake Station via Castleberry Hill, Atlanta Univ Ctr, Fair St, Mozley Park',
'Route 132 - Chamblee Station' => 'Dunwoody Club to Chamblee Station via Tilly Mill, GSU Dunwoody, N. Peachtree, Chamblee City Hall',
'Route 132 - Dunwoody Village' => 'Chamblee to Dunwoody Club via Chamblee City Hall, N. Peachtree, Tilly Mill, GSU Dunwoody',
'Route 140 - North Springs Station' => 'North Springs Station',
'Route 140 - Windward Park n Ride' => 'Windward P/R via North Point Pkwy',
'Route 141-Windward Park & Ride' => 'Windward  P/R via Haynes Bridge Rd and SR-9',
'Route 141- North Springs Station' => 'North Springs Station',
'Route 143 - North Springs Station' => 'N. Springs Station Express',
'Route 143 North Springs Station' => 'N. Springs Station Express',
'Route 143 Windward Park-Ride' => 'Windward P/R Express',
'Route 143 Windward Park-Ride Deerfield Parkway' => 'Windward P/R Express',
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
'Route 155- Polar Rock Terrace' => 'GA State to Polar Rock via Five Points, Forsyth St, Windsor St, Lakewood Ave',
'Route 16 - Lenox Station' => 'Five Points to Lenox Station via Ralph McGill, N. Highland, Executive Pk, Lenox Rd',
'Route 16 - Five Points Station / Underground Atlanta' => 'Lenox to Five Points via Lenox Rd, Executive Pk, N. Highland, Ralph McGill',
'Route 162 - Oakland City Station' => 'Delowe Village to Oakland City Station via Alison Ct, Stanton Rd, Campbellton Rd',
'Route 162 - Dorsey Ave' => 'Oakland City to P.West HS/Dorsey Ave via Campbellton Rd, Stanton Rd, Alison Ct',
'Route 162 Graywall St' => 'Oakland City to P.West HS/Dorsey Ave via Campbellton Rd, Stanton Rd, Alison Ct',
'Route 165 - Barge Road Park-Ride' => 'HE Holmes to Barge Rd P/R via Fairburn Rd',
'Route 165 - Hamilton E. Holmes Station' => 'Barge Rd P/R to HE Holmes Station via Fairburn Rd',
'Route 172 - College Park Station' => 'Oakland City to College Park Station via Sylvan Rd, Hapeville, Virginia Ave',
'Route 172 - Oakland  City Station' => 'College Park to Oakland City Station via Virginia Ave, Hapeville, Sylvan Rd',
'Route 178 - Hamilton Boulevard' => 'Lakewood to Southside Indus. via Macon Dr, Browns Mill Rd',
'Route 178 - Lakewood Station' => 'Southside Indus. to Lakewood Station via Hapeville Rd, Macon Dr',
'Route 180 - College Park Station' => 'Palmetto to College Park via Roosevelt Hwy, Fairburn, Union City, Washington Rd, Camp Creek Pkwy',
'Route 180 - Palmetto' => 'College Park to Palmetto via Camp Creek Pkwy, Washington Rd, Roosevelt Hwy, Union City, Fairburn',
'Route 181- East Point Station' => 'Fairburn to East Point via Roosevelt Hwy, Beverly Engram, Buffington Rd, GICC',
'Route 181 - Smith St' => 'East Point to Fairburn via GICC, Buffington Rd, Beverly Engram, Roosevelt Hwy',
'Route 183 - Barge Road Park N Ride' => 'Lakewood to Barge Rd P/R via Greenbriar Mall, Campbellton Rd, County Line',
'Route 183 - County Line Road' => 'Lakewood to Barge Rd P/R via Greenbriar Mall, Campbellton Rd, County Line',
'Route 183 - Lakewood Station / Fort McPherson' => 'Barge Rd P/R to Lakewood Station via Greenbriar Mall',
'Route 185 - North Springs Station' => 'Old Milton to N. Springs via Avalon, Alpharetta City Hall, Holcomb Br',
'Alpharetta/Holcomb Bridge Rd' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU',//185
'Route 185-Georgia State University Alpharetta Center' => 'N. Springs to Old Milton via Holcomb Br, Alpharetta City Hall, Avalon, GSU',
'Route 186 - Cone Street/Marietta Street' => 'E Wesley Chapel to Five Points via Snapfinger Woods, Rainbow Dr, S. DeKalb Mall, GA State Station',
'Route 186 - Pleasant Wood Drive' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'Route 186-Snapfinger Woods Dive' => 'Five Points to E Wesley Chapel via GA State Station, S. DeKalb Mall, Rainbow Dr, Snapfinger Woods',
'Rainbow Dr./Snapfinger Rd' => 'AMBIGUOUS',
'Route 189 - College Park Station' => 'S. Fulton P/R to College Park via Flat Shoals Rd, Scofield Rd, Old Natl Hwy, GICC',
'Route 189 - Old National Highway' => 'College Park to S. Fulton P/R via GICC, Old Natl Hwy, Scofield Rd, Flat Shoals Rd',
'Route 189- South Fulton Park/Ride' => 'College Park to S. Fulton P/R via GICC, Old Natl Hwy, Scofield Rd, Flat Shoals Rd',
'Route 19 - Decatur Station' => 'Chamblee to Decatur Station via Clairmont Rd, PDK Airport, Plaza Fiesta, Toco Hills, VA Hospital',
'Route 19- Chamblee Station' => 'Decatur to Chamblee Station via Clairmont Rd, VA Hospital, Toco Hills, Plaza Fiesta, PDK Airport',
'Clairmont Road' => 'AMBIGUOUS',
'Route 191-Clayton County Justice Center' => 'Lakewood to Clayton Justice Ctr via Airport-F, GA-85, Riverdale P/R, Flint River/GA-138',
'Route 191 Lakewood Station' => 'Clayton Justice Ctr to Lakewood via Flint River/SR138, Riverdale P/R, GA-85, Airport-F',
'Route 192 East Point Station' => 'Clayton Justice Ctr to East Point via Tara Blvd',
'Route 192- Clayton County Justice Center' => 'East Point to Clayton Justice Ctr via Tara Blvd',
'Route 193- East Point Station' => 'Clayton Justice Ctr to East Point Station via Jonesboro Rd, Clayton State Univ., Forest Park, Hapeville',
'Route 193- Clayton County Justice Center' => 'East Point to Clayton Justice Ctr via Hapeville, Forest Park, Clayton State Univ., Jonesboro Rd',
'Route 194 Southlake Mall' => 'Lakewood to Southlake Mall via Sylvan Rd, Hapeville, Conley Rd, Moreland Ave',
'Route 194 Lakewood Station' => 'Southlake Mall to Lakewood Station via Moreland Ave, Hapeville, Sylvan Rd',
'Route 195/ College Park Station' => 'South Park Blvd. to College Park via Forest Pkwy, Forest Park, Roosevelt Hwy, GICC',
'Route 195 South Park Blvd.' => 'College Park to South Park Blvd. via GICC, Roosevelt Hwy, Forest Park, Forest Pkwy',
'Route 196- College Park Station' => 'Southlake Mall to College Park Station via Mt Zion, Upper Riverdale, Riverdale P/R, GA-85',
'Route 196- Southlake Mall' => 'College Park to Southlake Mall via GA-85, Riverdale P/R, Upper Riverdale, Mt Zion',
'Route 2 - East Lake Station' => 'North Ave to East Lake Station via Ponce de Leon, Ponce City Market, Fernbank Museum',
'Route 2 - North Avenue Station' => 'East Lake to North Ave Station via Ponce de Leon, Fernbank Museum, Ponce City Market',
'Route 201 - H. E. Holmes Station / CC Transit' => 'Six Flags to HE Holmes (Seasonal)',
'Route 201 - Six Flags Over Georgia' => 'HE Holmes to Six Flags (Seasonal)',
'Route 21 - Kensington Station' => 'GA State to Kensington Station via Memorial Dr, Oakland Cemetery, East Lake Golf Club, Belvedere Plaza',
'Route 21- Georgia State Station' => 'Kensington to GA State Station via Memorial Dr, Belvedere Plaza, East Lake Golf Club, Oakland Cemetery, King Memorial Station',
'Route 221- Kensington Station' => 'Memorial Dr to Kensington Station Ltd via Memorial Dr, GSU Clarkston (Limited stops)',
'Route 221- Memorial Drive Park Ride' => 'Kensington to Memorial Dr P/R Ltd via Memorial Dr, GSU Clarkston,  N. Hairston Rd (Limited stops)',
'Route 221 Juliette Rd.' => 'Kensington to Memorial Dr P/R Ltd via Memorial Dr, GSU Clarkston,  N. Hairston Rd (Limited stops)',
'Route 24- Edgewood/ Candler Park' => 'Indian Creek to Candler Park Station via Glenwood, McAfee, Hosea Williams Dr, Kirkwood',
'Route 24- Indian Creek Station' => 'Candler Park to Indian Creek Station via Hosea Williams Dr, Kirkwood, McAfee, Glenwood',
'East Lake/Hosea Williams' => 'AMBIGUOUS',
'Route 25 - Doraville Station' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'Route 25 - Lenox Station' => 'Doraville/Medical Ctr to Lenox Station via Oglethorpe Univ., Brookhaven',
'Route 25- Medical Center Station' => 'Lenox to Doraville OR Medical Ctr via Brookhaven, Oglethorpe Univ., [Peachtree Indus. or Johnson Ferry]',
'Route 26 - Perry Heights' => 'North Ave to Perry Blvd via North Ave, Bankhead Station',
'Route 26 North Avenue Station' => 'Perry Blvd to North Ave Station via Bankhead Station, North Ave',
'Route 27 - Lindbergh Station / Marta Headquarters' => 'Lindbergh Station',
'Route 27- Midtown Station' => 'Midtown Station',
'Route 3 Helene S. Mills Senior Center' => 'HE Holmes to MLK Center via Mozley Park, Atlanta Univ. Ctr, Five Pts',
'Route 3 - H. E. Holmes Station' => 'MLK Center to HE Holmes Station via Five Pts, Atlanta Univ. Ctr, Mozley Park',
'Route 30 - Lindbergh Station' => 'N. Lake to Lindbergh Station via LaVista, Lakeside, Toco Hills',
'Route 30- Northlake Mall' => 'Lindbergh to N. Lake Mall via LaVista, Toco Hills, Lakeside',
'Route 32 - Bouldercrest' => 'Five Pts to Bouldercrest via Capitol, Zoo Atlanta, Confederate Ave',
'Route 32-Five Points Station' => 'Bouldercrest to Five Points via Confederate Ave, Zoo Atlanta, Capitol',
'Route 33 - Chamblee Station' => 'Lindbergh to Chamblee Station via LaVista, Briarcliff, Shallowford Rd',
'Route 33 - Lindbergh Station' => 'Chamblee to Lindbergh Station via Shallowford Rd, Briarcliff, LaVista',
'Route 34- Eastlake Station' => 'GSU-Decatur to East Lake Station via Clifton Springs, Gresham Rd, 2nd Ave',
'Route 34- Ga State University/Perimeter College' => 'East Lake to GSU-Decatur via 2nd Ave, Gresham Rd, Clifton Springs',
'Route 36- Decatur Station' => 'Midtown to Decatur Station via VA Highland, Emory, DeKalb Medical<br/><span class="detour">Rerouting to Decatur due to Avondale TOD construction.</span>',
'Route 36 Midtown Station' => 'Decatur to Midtown Station via DeKalb Med, Emory, VA Highland<br/><span class="detour">Rerouting to Decatur due to Avondale TOD construction.</span>',
'Route 37 Moores Mill Rd' => 'Arts Center to Moores Mill Shop. Ctr via Atlantic Station, Bellemeade Ave, Defoors Ferry',
'Route 37- Art Center Station' => 'Moores Mill Shop. Ctr to Arts Center Station via Defoors Ferry, Bellemeade Ave, Atlantic Station',
'Route 39 Doraville Station' => 'Lindbergh to Doraville Station via Sydney Marcus Blvd, Buford Hwy, Corporate Square, Plaza Fiesta',
'Route 39 Lindbergh Station' => 'Doraville to Lindbergh Station via Buford Hwy, Plaza Fiesta, Corporate Square, Sydney Marcus Blvd',
'Thomasville/Moreland Avenue' => 'Thomasville to Inman Park Station via Forest Park Rd, Kipling St, Moreland Ave',
'Route 4 - Iman Park Station' => 'Thomasville to Inman Park Station via Forest Park Rd, Kipling St, Moreland Ave',
'Flint River Rd- Route 191' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 4- Rebel Forest Drive' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 4- Metro Transitional Center' => 'Inman Park to Thomasville via Moreland Ave, Valley View, Rebel Forest Dr, Forest Park Rd',
'Route 42 - Lakewood Station' => 'Five Points to Lakewood Station via Mc Daniel St, Pryor Rd, Lakewood Amphitheater',
'Route 42- Five Points' => 'Lakewood to Five Points Station via Lakewood Amphitheater, Pryor Rd, Mc Daniel St',
'Route 47 - Chamblee Station' => 'Brookhaven to Chamblee Station via Briarwood, I-85 Access Rd, Chamblee-Tucker',
'Route 47- Broohaven Station' => 'Chamblee to Brookhaven Station via Chamblee-Tucker, I-85 Access Rd, Briarwood',
'Route 49- Five Points Station' => 'Moreland/Woodland to Five Points via Custer Ave, Hill St, Pollard Blvd, Central Ave',
'Route 49- Moreland Drive/ Woodland Ave' => 'Five Points to Moreland/Woodland Ave via Pryor St, Pollard Blvd, Mc Donough Blvd',
'Route 5 - Dunwoody Station' => 'Lindbergh to Dunwoody Station via Piedmont Rd, Buckhead, Roswell Rd, Hammond Dr',
'Route 5 - Lindbergh Station' => 'Dunwoody to Lindbergh Station via Hammond Dr, Roswell Rd, Buckhead, Piedmont Rd',
'Route 50 - Bankhead Station' => 'Carroll Heights to Bankhead Station via Bolton Rd, Donald E. Hollowell Pkwy',
'Route 50- Croft Place/ Bolton Road' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'Route 50-Old Gordon Road' => 'Bankhead to Carroll Heights via Donald E. Hollowell Pkwy, Bolton Rd, Old Gordon Rd',
'Route 51 Hamilton E Holmes Station' => 'Five Pts to HE Holmes Station via CNN, Joseph E. Boone Blvd, Lincoln Cemetery',
'Route 51- Westlake Station' => 'Five Pts to HE Holmes Station via CNN, Joseph E. Boone Blvd, Lincoln Cemetery',
'Route 51-Five Points' => 'HE Holmes to Five Points via Lincoln Cemetery, Joseph E. Boone Blvd, Centennial Park, CNN',
'Route 53- Skipper Dr./ Harwell Rd' => 'West Lake to Skipper Dr via West Lake Ave, Baker Rd, Allegro Dr',
'Route 53- West Lake Station' => 'Skipper Dr to West Lake Station via Allegro Dr, Baker Rd, West Lake Ave',
'Route 55 - Five Points Station' => 'Forest Park to Five Points via Jonesboro Rd, Mc Donough Blvd, Hank Aaron Dr',
'Route 55- Forest Parkway & Barlett Dive' => 'Five Points to Forest Park via Hank Aaron Dr, Mc Donough Blvd, Jonesboro Rd',
'Route 56 - Hamilton E. Holmes Station' => 'Adamsville to HE Holmes Station via Bakers Ferry, Collier Rd, Burton Rd',
'Route 56 - Plainville Circle' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry',
'Route 56- Dollar Mill Road' => 'HE Holmes to Adamsville via Burton Rd, Collier Rd, Bakers Ferry',
'Route 58 - Bankhead Station' => 'Atlanta Industrial to Bankhead Station via Northwest Dr, Hollywood Dr, Donald E. Hollowell Pkwy',
'Route 58- Atlanta Industrial Pkwy' => 'Bankhead to Atlanta Industrial via Donald E. Hollowell Pkwy, Hollywood Rd, Northwest Dr',
'Route 6 - Inman Park Station' => 'Lindbergh to Inman Park Station via LaVista, Emory, Briarcliff, Moreland',
'Route 6 - Lindbergh Station' => 'Inman Park to Lindbergh Station via Moreland, Briarcliff, Emory, LaVista',
'Route 60 - Hamilton E. Holmes Station' => 'Moores Mill Shop. Ctr to HE Holmes Station via Hollywood Rd, F. Douglass High School, Holmes Dr',
'Route 60 - Moores Mill Shopping Center' => 'HE Holmes to Moores Mill Shop. Ctr via Holmes Dr, F. Douglass High School, Hollywood Rd',
'Route 66 - Barge Rd. Park/Ride' => 'HE Holmes to Barge Rd P/R via Lynhurst Dr, Harbin Rd, Therell High School, Greenbriar Mall',
'Route 66 - Hamilton E.Holmes Station' => 'Barge Rd P/R to HE Holmes Station via Greenbriar Mall, Therell High School, Harbin Rd, Lynhurst Dr',
'Route 67 - West End Station' => 'Dixie Hills to West End Station via Verbena Cir, West Lake Station, Westview Cemetery, Lucile St',
'Route 67 - West Lake Station' => 'West End to Dixie Hills via Lucile St, Westview Cemetery, West Lake Station, Verbena Cir',
'Route 68 - Asby  Station' => 'HE Holmes to Ashby Station via Donnelly Ave, West End Station, Atlanta Univ. Ctr',
'Route 68 - Ashby St. Station' => 'HE Holmes to Ashby Station via Donnelly Ave, West End Station, Atlanta Univ. Ctr',
'Route 68 Hamilton E. Holmes Station' => 'Ashby to HE Holmes Station via Atlanta Univ. Ctr, West End Station, Beecher St',
'Hamilton E. Holmes Station' => 'Ashby to HE Holmes Station via Atlanta Univ. Ctr, West End Station, Beecher St',
'Route 71 Fulton Industrial Blvd' => 'West End to Fulton Indus. via Abernathy Blvd, Cascade Rd, Cascade Springs Preserve',
'Route 71 - West End Station' => 'Fulton Indus. to West End via Cascade Rd, Cascade Springs Preserve, Abernathy Blvd',
'Route 73 LaGrange Blvd' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'Route 73- Westpark Place' => 'HE Holmes to Boat Rock Blvd via Adamsville, Fulton Co Airport, Fulton Industrial',
'Route 73 - Hamilton E. Holmes Station' => 'Boat Rock to HE Holmes Station via Fulton Industrial, Fulton Co Airport, Adamsville',
'Route 74 - Battle Forrest Drive' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'Route 74 - Five Points Station' => 'S. DeKalb Mall to Five Points via [Whites Mill or Battle Forest], Flat Schoals, East Atlanta Vlg',
'Route 74- Whites Mill Road' => 'Five Points to S. DeKalb Mall via East Atlanta Vlg, Flat Schoals, [Whites Mill or Battle Forest]',
'Route 75 - Avondale Station' => 'Tucker to Avondale Station via Tucker High School, Lawrenceville Hwy, N. DeKalb Mall, DeKalb Indus.',
'Route 75 - Tuckerstone Pkwy' => 'Avondale to Tucker via DeKalb Indus., N. DeKalb Mall, Lawrenceville Hwy, Tucker High School',
'Route 78 - East Point Station' => 'Browns Mill to East Point Station via Cleveland Ave',
'Route 78 - Jonesboro Road/Cleveland Avenue' => 'East Point to Browns Mill Park via Cleveland Ave, Jonesboro Rd',
'Route 79- East Point Station' => 'Oakland City to East Point Station via Sylvan Rd, Springdale Rd, Jefferson Ave, Cleveland Ave',
'Route 79- Oakland City Station' => 'East Point to Oakland City Station via Cleveland Ave, Jefferson Ave, Springdale Rd, Sylvan Rd',
'Route 8- Kensington Station' => 'Brookhaven to Kensington Station via Executive Park, Toco Hills, N. DeKalb Mall<br/><span class="detour">Rerouting to Kensington due to Avondale TOD construction.</span>',
'Route 8 - Brookhaven Station' => 'Kensington to Brookhaven Station via N. DeKalb Mall, Toco Hills, Executive Park<br/><span class="detour">Rerouting to Kensington due to Avondale TOD construction.</span>',
'Route 81 - Campbellton Road' => 'West End to Adams Park via Oglethorpe Ave, Lawton St, Westmont Rd, Venetian Hills',
'Route 81 - West End Station' => 'Adams Park to West End Station via Venetian Hills, Westmont Rd, Lawton St, Oglethorpe Ave',
'Route 82 - College Park Station' => 'Union City to College  Park via Roosevelt Ave, Welcome All Rd, Camp Creek Pkwy/Marketplace',
'Route 82 - Union City' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All Rd, Roosevelt Hwy',
'Route 82 Camp Creek Market Place' => 'College Park to Union City via Camp Creek Pkwy/Marketplace, Welcome All, Roosevelt Hwy',
'Route 83 - Barge Road Park n Ride' => 'Oakland City to Barge Rd P/R via Campbellton Rd, Adams Park, Greenbriar Mall',
'Route 83 - Oakland City Station' => 'Barge Rd P/R to Oakland City Station via Greenbriar Mall, Campbellton Rd, Adams Park',
'Route 84 - East Point Station' => 'Camp Creek to East Point Station via Camp Creek Marketplace, Mt Olive, Washington Rd',
'Route 84 Social Security Administration Office' => 'East Point to Camp Creek via Washington Rd, Mt Olive, Camp Creek Marketplace',
'Route 85 - Mansell Park & Ride/Mansell Road' => 'N. Springs to Mansell P/R via Dunwoody Place, Historic Roswell, Mansell Rd',
'Route 85 - North Springs Station' => 'Mansell P/R to N. Springs via Mansell Rd, Historic Roswell, Dunwoody Place',
'Route 86- Kensington Station' => 'Stonecrest Mall to Kensington Station via Hillandale Rd, Snapfinger Woods, Peachcrest Rd',
'Route 86- Stonecrest Mall' => 'Kensington to Stonecrest Mall via Peachcrest Rd, Snapfinger Woods, Hillandale Rd',
'Route 86-Hillandale Drive' => 'Kensington to Stonecrest Mall via Peachcrest Rd, Snapfinger Woods, Hillandale Rd',
'Route 87 - Dunwoody Station' => 'Dunwoody Pl. to Dunwoody Station via Roswell Rd, Hammond Dr',
'Route 87 - North Springs Station' => 'Dunwoody to N. Springs via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'Route 87 Roswell Road/ Dunwoody Place' => 'Dunwoody to Dunwoody Pl. via Hammond Dr, Roswell Rd, Dunwoody Pl.',
'Route 89 -  College Park Station' => 'Shannon Square to College Park via Jonesboro Rd, Old Natl Hwy, Sullivan Rd, Best Rd',
'Route 89- Union Station' => 'College Park to Shannon Square via Best Rd, Sullivan Rd, Old Natl Hwy, Jonesboro Rd',
'Toney Valley /Peachcrest Rd.' => 'S. DeKalb Mall &hArr; Inman Park Station via Tilson Rd, Brannen Rd, East ATL Vlg',//9
'Route 9- Inman Park Station' => 'S. DeKalb Mall to Inman Park Station via Tilson Rd, Brannen Rd, East ATL Vlg',
'Route 9- Rainbow Way' => 'Inman Park to S. DeKalb Mall via East ATL Vlg, Brannen Rd, Tilson Rd',
'Route 93 - East Point Station' => 'Camp Creek to East Point Station via Deerwood, Greenbriar Mall, Headland Dr.',
'Route 93 Social Security Administration Office' => 'East Point to Camp Creek via Headland Dr., Greenbriar Mall, Deerwood',
'Route 94 West End Station' => 'District at Howell Mill to West End Station via Northside Dr., Vine City Station',
'Route 94 District of Howell Mill' => 'West End to District at Howell Mill via Northside Dr., Vine City Station',
'Route 95 - King Arnold Street' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'Route 95 - West End Station' => 'Hapeville to West End Station via King Arnold St, Metropolitan Pkwy, Atlanta Tech College',
'Route 95 Atlanta Tech /Atlanta Metro College' => 'West End to Hapeville via Metropolitan Pkwy, Atlanta Tech College, King Arnold St',
'Route 99 - Georgia State Station' => 'GA State  Station via King Memorial',
'Route 99 - North Avenue Station' => 'North Ave Station',
'UNDEF' => 'AMBIGUOUS',

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
	["6", "27", "30", "33"], // Lindbergh Drive sector. 900611/900612
	["6", "30", "33"], // La Vista sector + highlighting.

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