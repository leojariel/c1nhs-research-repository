(function () {
 const currentYear = new Date().getFullYear();
 document.getElementById("yearBadge").textContent = currentYear;

 // ---------- BUILD DATES FOR CURRENT YEAR (JAN 1 – DEC 31) ----------
 const yearStart = new Date(currentYear, 0, 1); // Jan 1
 const yearEnd = new Date(currentYear, 11, 31, 23, 59, 59); // Dec 31

 // We create week columns starting from the Sunday on or before Jan 1,
 // ending with the Saturday on or after Dec 31.
 function getStartSunday(date) {
  const d = new Date(date);
  const day = d.getDay(); // 0 = Sunday
  d.setDate(d.getDate() - day);
  d.setHours(0, 0, 0, 0);
  return d;
 }

 function getEndSaturday(date) {
  const d = new Date(date);
  const day = d.getDay();
  if (day !== 6) {
   d.setDate(d.getDate() + (6 - day));
  }
  d.setHours(23, 59, 59, 999);
  return d;
 }

 const gridStart = getStartSunday(yearStart);
 const gridEnd = getEndSaturday(yearEnd);

 // Generate all weeks from gridStart to gridEnd
 const weeks = [];
 const cursor = new Date(gridStart);

 while (cursor <= gridEnd) {
  const week = [];
  for (let d = 0; d < 7; d++) {
   const dateObj = new Date(cursor);
   week.push({
    date: new Date(dateObj),
    level: 0,
    visits: 0,
    inYear: dateObj.getFullYear() === currentYear,
   });
   cursor.setDate(cursor.getDate() + 1);
  }
  weeks.push(week);
 }

 // ---------- MOCK VISIT DATA (will be replaced by backend) ----------
 function generateMockData(weeksArray) {
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  for (let week of weeksArray) {
   for (let day of week) {
    if (!day.inYear) {
     day.visits = 0;
     day.level = 0;
     continue;
    }
    // Random visits 0-15 for demonstration
    const randomVisits = Math.floor(Math.random() * 16);
    day.visits = randomVisits;
    if (randomVisits === 0) day.level = 0;
    else if (randomVisits <= 3) day.level = 1;
    else if (randomVisits <= 7) day.level = 2;
    else if (randomVisits <= 12) day.level = 3;
    else day.level = 4;

    // Highlight today if it falls within the year
    if (day.date.getTime() === today.getTime()) {
     day.visits = 15;
     day.level = 4;
    }
   }
  }
 }
 generateMockData(weeks);

 // ---------- RENDERING ----------
 const gridContainer = document.getElementById("contributionGrid");
 const monthLabelsContainer = document.getElementById("monthLabelsContainer");
 const dayLabelsContainer = document.getElementById("dayLabelsContainer");
 const tooltip = document.getElementById("tooltip");

 gridContainer.innerHTML = "";
 monthLabelsContainer.innerHTML = "";
 dayLabelsContainer.innerHTML = "";

 // Day labels (Mon, Wed, Fri)
 const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
 const visibleDays = [1, 3, 5];
 for (let row = 0; row < 7; row++) {
  const labelDiv = document.createElement("div");
  labelDiv.className = "day-label";
  labelDiv.textContent = visibleDays.includes(row) ? dayNames[row] : "";
  dayLabelsContainer.appendChild(labelDiv);
 }

 // Month labels: detect first occurrence of each month across weeks
 function renderMonthLabels() {
  const monthPositions = [];
  let lastMonth = -1;

  for (let w = 0; w < weeks.length; w++) {
   const firstDay = weeks[w][0].date;
   // Only consider months within the current year
   if (firstDay.getFullYear() !== currentYear) continue;

   const month = firstDay.getMonth();
   if (month !== lastMonth) {
    const monthName = firstDay.toLocaleString("default", {
     month: "short",
    });
    monthPositions.push({
     name: monthName,
     weekIndex: w,
    });
    lastMonth = month;
   }
  }

  // Create label array matching week columns
  const labelArray = new Array(weeks.length).fill("");
  monthPositions.forEach((p) => {
   labelArray[p.weekIndex] = p.name;
  });

  monthLabelsContainer.style.display = "flex";
  monthLabelsContainer.style.gap = "3px";
  labelArray.forEach((text, idx) => {
   const span = document.createElement("span");
   span.className = "month-label";
   span.textContent = text;
   span.style.width = "14px";
   monthLabelsContainer.appendChild(span);
  });
 }
 renderMonthLabels();

 // Build grid columns
 weeks.forEach((week, weekIndex) => {
  const columnDiv = document.createElement("div");
  columnDiv.className = "week-column";

  week.forEach((day) => {
   const cell = document.createElement("div");
   cell.className = "day-cell";

   // Only color cells that belong to current year; others stay empty
   if (day.inYear) {
    cell.setAttribute("data-level", day.level);
    cell.setAttribute("data-visits", day.visits);
   } else {
    cell.setAttribute("data-level", 0);
    cell.setAttribute("data-visits", 0);
    cell.style.opacity = "0.35"; // dim out-of-year cells subtly
   }

   cell.setAttribute("data-date", day.date.toISOString().split("T")[0]);
   cell.setAttribute(
    "aria-label",
    `${day.date.toDateString()} — ${day.inYear ? day.visits + " visits" : "outside year"}`,
   );

   // Tooltip logic
   // Tooltip logic
   const attachTooltip = (e) => {
    const rect = cell.getBoundingClientRect();
    const dateStr = day.date.toDateString();
    const visitInfo = day.inYear
     ? `${day.visits} visit${day.visits !== 1 ? "s" : ""}`
     : "outside year";
    tooltip.textContent = `${dateStr}: ${visitInfo}`;
    tooltip.classList.add("show");

    const tooltipHeight = tooltip.offsetHeight || 30;

    // Calculate position relative to the viewport first
    let left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2;
    let top = rect.top - tooltipHeight - 6;

    // Boundary checks
    if (left < 10) left = 10;
    if (left + tooltip.offsetWidth > window.innerWidth - 10) {
     left = window.innerWidth - tooltip.offsetWidth - 10;
    }

    // Ensure tooltip doesn't go above viewport
    if (top < 10) {
     // Show below the cell instead
     top = rect.bottom + 6;
    }

    // Use fixed positioning since we're calculating viewport-relative coordinates
    tooltip.style.position = "fixed";
    tooltip.style.left = `${left}px`;
    tooltip.style.top = `${top}px`;
   };

   cell.addEventListener("mouseenter", attachTooltip);
   cell.addEventListener("mouseleave", () => tooltip.classList.remove("show"));

   cell.addEventListener("touchstart", (e) => {
    e.preventDefault();
    attachTooltip(e);
    setTimeout(() => tooltip.classList.remove("show"), 1500);
   });

   columnDiv.appendChild(cell);
  });

  gridContainer.appendChild(columnDiv);
 });

 // Sync month label width with grid
 function syncWidth() {
  if (gridContainer && monthLabelsContainer) {
   const gridWidth = gridContainer.scrollWidth;
   if (gridWidth > 0) {
    monthLabelsContainer.style.width = gridWidth + "px";
    monthLabelsContainer.style.minWidth = gridWidth + "px";
   }
  }
 }

 window.addEventListener("load", syncWidth);
 const resizeObserver = new ResizeObserver(() => syncWidth());
 if (gridContainer) resizeObserver.observe(gridContainer);
 setTimeout(syncWidth, 15);

 document
  .querySelector(".contribution-container")
  .addEventListener("mouseleave", () => {
   tooltip.classList.remove("show");
  });
})();
