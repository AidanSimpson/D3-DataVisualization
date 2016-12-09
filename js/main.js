//JavaScript Document
(function() { //Enclosing code in this will immediatly run the code within.
"use strict"; //This is a way to opt in to a restricted varient of JavaScript. This makes it immposible to create global variables.
console.log("SEAF Fired"); //Self-Executing Anonymous Function

//Research / Reference Links
//http://stackoverflow.com/questions/13563471/random-colors-for-circles-in-d3-js-graph
//http://vallandingham.me/vis/gates/
//https://github.com/d3/d3-force
//https://www.youtube.com/watch?v=lPr60pexvEM
//http://www.nytimes.com/interactive/2012/02/13/us/politics/2013-budget-proposal-graphic.html?_r=0
//https://github.com/vlandham/vlandham.github.com/blob/master/vis/gates/coffee/vis.coffee

var data = [];//create the array for php information
var ajax = new XMLHttpRequest(); //make the request

var width = 800;
var height = 500;

//var colour = d3.schemeCategory20();

var svg = d3.select("#chart") //grab the section with the id of chart from the DOM (This is where the entire bubble chart will be built/displayed)
    .append("svg")
    .attr("height", height)
    .attr("width", width)
    .append("g")
    .attr("transform", "translate(0,0)")

var div = d3.select("body").append("div") //create an imaginary div for the tooltip information
    .attr("class", "tooltip")
    .style("opacity", 0);

var radiusScale = d3.scaleSqrt().domain([1, 500]).range([10, 80]) //set the smallest and largest values, and set the size range (based off the population information)

//define the built in D3 force for the bubbles (based on the button selection) so they can either come together or move appart
var XOne = d3.forceX(function(d) {
    if(d.country_edurating === "low") {
        return 100
    }else if(d.country_edurating === "med") {
        return 400
    }else{
        return 700
    }

}).strength(0.05)

var YOne = d3.forceY(function(d){
    if(d.country_edurating === "low") {
        return 400
    }else if(d.country_edurating === "med") {
        return 250
    }else{
        return 100
    }
}).strength(0.5)

var XTwo = d3.forceX(function(d){
    if(d.country_employment < 65) {
        return 100
    }else{
        return 600
    }

}).strength(0.1)

var YTwo = d3.forceY(function(d){
    if(d.country_employment < 65) {
        return 200
    }else{
        return 200
    }
}).strength(0.5)

var forceCollide = d3.forceCollide(function(d) { //the collision force grows based on the size of the circle (plus a bit more padding around)
    return radiusScale(d.country_pop) + 3;
})

var simulation = d3.forceSimulation() //create force simulations and applies forces to each item so they can go somewhere (being the middle)
    .force("x", d3.forceX(width / 2).strength(0.5)) //helps to position the circles in the middle of the y and x axis
    .force("y", d3.forceY(height / 2).strength(0.5))
    .force("collide", forceCollide)

//Connect to the JSON file created from the database information
d3.queue()
    .defer(d3.json, "newDataFile.json")
    .await(ready)

function ready (error, pop) {
        var circles = svg.selectAll(".pop")
        .data(pop)
        .enter().append("circle")
        .attr("class", "pop")
        .attr("r", function(d){
            return radiusScale(d.country_pop) //the radius of each of the circles depends on the population of each country
        })

    .style("fill",function() { return "hsl(" + Math.random()*55 + ",70%,50%)";}) //generate a random colour for each bubble upon first load/refresh
    .attr("stroke", "#d83426")

    //stuff that will happen when bubble(s) are hovered over
    d3.selectAll("circle")
    .on("mouseover", function(d) {

        d3.scaleSqrt().domain([2, 400]).range([10, 80])
            div.transition()
            .duration(800)
            .style("opacity", 1);
            //select the info we want to display when a bubble is hovered over
            div.html('Country: ' + d.country_name + '<br/>' + 'Population: ' + d.country_pop + ' million' + '<br/>' + 'Education Rate: ' + d.country_completion + '%' + '<br/>' + 'Employment Rate: ' + d.country_employment + '%')
            .style("top", (d3.event.pageY+50)+"px") //position the info to hover beside the selected bubble
            .style("left", (d3.event.pageX+25)+"px")

        d3.select(this)
            .transition()
            .duration(400)
            .style('fill', '#D8B626') //when a bubble is hovered over, the fill colour will change to highlight that it is being viewed
            .style('stroke', '#333')
            .style('border', '3px')
            // .attr("r", function(d){
            //     return radiusScale(d.country_pop + 0.001)
            // })
            console.log("Tooltip Activated");
    })

    //stuff that will happen when bubble(s) are no longer being hovered over
    .on("mouseout", function() {
        div.transition()
            .duration(800)
            .style("opacity", 0);

        d3.select(this)
            .style('opacity', 1)
            .transition()
            .duration(300)
            .style('fill', '#D83426') //make the fill for each the same to show they have been viewed
            .style('stroke', 'none')
    });

    d3.selectAll("circle", function(d) { //just a test to see if the tooltip is working like it should
        svg.append("text")
            .text("hello")
    })

    d3.select("#employment").on('click', function(){ //make the bubbles go left or right based on the employment rate data
        simulation
            .force("x", XTwo) //the force has been defined above
            .force("y", YTwo)
            .alphaTarget(0.5)
            .restart()
        console.log("Clicked")
    })
    d3.select("#completion").on('click', function(){ //make the bubble split based on the completion percentage
        simulation
            .force("x", XOne) //the force has been defined above
            .force("y", YOne)
            .alphaTarget(0.5)
            .restart()
        console.log("Clicked")
    })
    d3.select("#reset").on('click', function(){ //make all the bubbles go back towards the center
        simulation
            .force("x",  d3.forceX(width / 2).strength(0.3))
            .force("y",  d3.forceY(height / 2).strength(0.3))
            .alphaTarget(0.5)
            .restart()
        console.log("Clicked")
    })

    simulation.nodes(pop) //constantly refreshes the bubbles so the position is known at all times
    .on('tick', ticked)
    function ticked(){
    circles
        .attr("cx", function(d) {
            return d.x //the x coordinates
        })
        .attr("cy", function(d){
            return d.y //the y coordinates
        })
    }
}

ajax.open("GET", "connect.php", true);//call the php function in connect.php causing state to change
ajax.send();

})();