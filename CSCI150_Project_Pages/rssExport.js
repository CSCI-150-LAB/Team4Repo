const rss_url = "./rssFetch.php";

fetch(rss_url)
    .then(response => response.text())
    .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
    .then(data => {
        console.log(data);
        // grab all the item element which are the articles of the feed
        const articles = data.querySelectorAll("item");
        var newNewsFeed = document.createElement("div");
        articles.forEach(ele => {

            // Create each element in each article
            // hFour is for the title
            // a is for the hyperlink
            // hFive is for the posted date
            // p is for the description
            var art = document.createElement("article"),
                hFour = document.createElement("h4"),
                aLink = document.createElement("a"),
                hFive = document.createElement("h5"),
                pDesc = document.createElement("p");

            // Linking all the elements together
            newNewsFeed.appendChild(art);
            art.appendChild(hFour);
            hFour.appendChild(aLink);
            art.appendChild(hFive);
            art.appendChild(pDesc);

            // Setting the values for each tag by scanning the page for each tag
            aLink.setAttribute("href", ele.querySelector("link").innerHTML);
            aLink.innerHTML = ele.querySelector("title").innerHTML;
            
            tempDate = ele.querySelector("pubDate").innerHTML;
            hFive.innerHTML = "Posted on " + tempDate.substr(0, tempDate.indexOf("+") - 1);
            tempDesc = ele.querySelector("description").innerHTML;
            pDesc.innerHTML = tempDesc.replace("<![CDATA[", "").replace("]]>", "");
            pDesc.setAttribute("style", "font-size:12");
                
        });
        document.getElementById("newsFeed").appendChild(newNewsFeed);
    })
