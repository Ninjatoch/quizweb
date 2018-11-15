function getScore(totalScore, givenScore)
{
    var result =  ( parseFloat(givenScore) / parseFloat(totalScore) ) * 100;
    return Math.round(result * 100) / 100;
}