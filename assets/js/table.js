window.onload = function () {
    document.getElementById("column1").addEventListener("click", function () {
        // 隱藏所有資料區塊
        hideAllData();

        // 顯示欄位1的相應資料
        document.getElementById("dataColumn1").style.display = "block";
    });

    document.getElementById("column2").addEventListener("click", function () {
        // 隱藏所有資料區塊
        hideAllData();

        // 顯示欄位2的相應資料
        document.getElementById("dataColumn2").style.display = "block";
    });

    document.getElementById("column3").addEventListener("click", function () {
        // 隱藏所有資料區塊
        hideAllData();

        // 顯示欄位3的相應資料
        document.getElementById("dataColumn3").style.display = "block";
    });

    function hideAllData() {
        // 隱藏所有資料區塊
        document.getElementById("dataColumn1").style.display = "none";
        document.getElementById("dataColumn2").style.display = "none";
        document.getElementById("dataColumn3").style.display = "none";
    }
};
