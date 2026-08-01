<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
 <title>Visit Tracker • Full Width with Scroll</title>
 <style>
  * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
  }

  body {
   background: #f6f8fa;
   font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
   display: flex;
   justify-content: center;
   align-items: flex-start;
   min-height: 100vh;
   margin: 0;
   padding: 1.5rem;
  }

  .contribution-container {
   width: 100%;
   background: white;
   border: 1px solid #a4a4a4;
   border-radius: 12px;
   padding: 1.8rem 1.5rem 2rem;
   transition: all 0.2s ease;
   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
  }

  .graph-header {
   display: flex;
   flex-wrap: wrap;
   align-items: center;
   justify-content: space-between;
   margin-bottom: 1.2rem;
   gap: 1rem;
  }

  .graph-title {
   font-size: 1.25rem;
   font-weight: 600;
   color: #1f2328;
   display: flex;
   align-items: center;
   gap: 0.5rem;
   flex-wrap: wrap;
  }

  .graph-title span {
   background: #ddf4ff;
   color: #0969da;
   padding: 0.2rem 0.7rem;
   border-radius: 20px;
   font-size: 0.85rem;
   font-weight: 500;
   white-space: nowrap;
  }

  .legend {
   display: flex;
   align-items: center;
   gap: 0.5rem;
   font-size: 0.8rem;
   color: #57606a;
   flex-wrap: wrap;
  }

  .legend-boxes {
   display: flex;
   gap: 3px;
  }

  .legend-box {
   width: 14px;
   height: 14px;
   border-radius: 3px;
   background: #ebedf0;
  }

  .legend-box.l1 {
   background: #9be9a8;
  }

  .legend-box.l2 {
   background: #40c463;
  }

  .legend-box.l3 {
   background: #30a14e;
  }

  .legend-box.l4 {
   background: #216e39;
  }

  /* Scroll wrapper takes full width but allows horizontal scroll */
  .graph-scroll-wrapper {
   width: 100%;
   overflow-x: auto;
   overflow-y: visible;
   -webkit-overflow-scrolling: touch;
   scrollbar-width: thin;
   scrollbar-color: #c1c7cd #f0f2f5;
   padding-bottom: 0.3rem;
  }

  .graph-scroll-wrapper::-webkit-scrollbar {
   height: 6px;
  }

  .graph-scroll-wrapper::-webkit-scrollbar-track {
   background: #f0f2f5;
   border-radius: 10px;
  }

  .graph-scroll-wrapper::-webkit-scrollbar-thumb {
   background: #c1c7cd;
   border-radius: 10px;
  }

  .contribution-grid {
   display: flex;
   gap: 3px;
   min-width: 100%;
   width: max-content;
   align-items: flex-start;
  }

  .week-column {
   display: flex;
   flex-direction: column;
   gap: 3px;
   flex: 1 0 auto;
  }

  .day-cell {
   width: 14px;
   height: 14px;
   border-radius: 3px;
   background: #ebedf0;
   transition: all 0.2s ease;
   position: relative;
   cursor: default;
   outline: none;
  }

  .day-cell[data-level="0"] {
   background: #ebedf0;
  }

  .day-cell[data-level="1"] {
   background: #9be9a8;
  }

  .day-cell[data-level="2"] {
   background: #40c463;
  }

  .day-cell[data-level="3"] {
   background: #30a14e;
  }

  .day-cell[data-level="4"] {
   background: #216e39;
  }

  .day-cell:hover {
   outline: 2px solid #1f2328;
   outline-offset: 1px;
   z-index: 2;
   transform: scale(1.15);
  }

  .month-labels {
   display: flex;
   min-width: 100%;
   width: max-content;
   margin-bottom: 0.3rem;
   padding-left: 0;
   font-size: 0.7rem;
   color: #656d76;
   font-weight: 500;
   gap: 3px;
  }

  .month-label {
   text-align: left;
   white-space: nowrap;
   flex: 1 0 auto;
   width: 14px;
   overflow: visible;
  }

  .day-labels-wrapper {
   display: flex;
   gap: 3px;
  }

  .day-labels-column {
   display: flex;
   flex-direction: column;
   gap: 3px;
   margin-right: 6px;
   font-size: 0.7rem;
   color: #656d76;
   justify-content: flex-start;
   padding-top: 1px;
   flex-shrink: 0;
  }

  .day-label {
   height: 14px;
   display: flex;
   align-items: center;
   justify-content: flex-end;
   padding-right: 4px;
  }

  .tooltip {
   position: fixed;
   background: #1f2328;
   color: white;
   padding: 0.4rem 0.8rem;
   border-radius: 8px;
   font-size: 0.8rem;
   pointer-events: none;
   z-index: 100;
   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
   white-space: nowrap;
   opacity: 0;
   transition: opacity 0.15s ease;
   font-weight: 500;
  }

  .tooltip.show {
   opacity: 1;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
   body {
    padding: 0.8rem;
   }

   .contribution-container {
    padding: 1.2rem 1rem 1.5rem;
   }

   .graph-header {
    flex-direction: column;
    align-items: flex-start;
   }

   .day-cell {
    width: 13px;
    height: 13px;
   }

   .legend-box {
    width: 12px;
    height: 12px;
   }

   .day-label {
    height: 13px;
    font-size: 0.65rem;
   }

   .month-label {
    width: 13px;
   }
  }

  @media (max-width: 480px) {
   body {
    padding: 0.5rem;
   }

   .contribution-container {
    padding: 1rem 0.8rem 1.2rem;
   }

   .day-cell {
    width: 12px;
    height: 12px;
   }

   .day-label {
    height: 12px;
    font-size: 0.6rem;
   }

   .month-label {
    width: 12px;
    font-size: 0.65rem;
   }

   .month-labels {
    font-size: 0.6rem;
   }

   .legend {
    font-size: 0.7rem;
   }

   .contribution-grid {
    gap: 2px;
   }

   .week-column {
    gap: 2px;
   }

   .month-labels {
    gap: 2px;
   }

   .day-labels-column {
    gap: 2px;
   }
  }
 </style>
</head>

<body>
 <div class="contribution-container">
  <div class="graph-header">
   <div class="graph-title">
    📊 Visit log
    <span id="yearBadge"></span>
   </div>
   <div class="legend">
    <span>Less</span>
    <div class="legend-boxes">
     <div class="legend-box"></div>
     <div class="legend-box l1"></div>
     <div class="legend-box l2"></div>
     <div class="legend-box l3"></div>
     <div class="legend-box l4"></div>
    </div>
    <span>More</span>
   </div>
  </div>

  <!-- Month labels with horizontal scroll -->
  <div style="width: 100%; overflow-x: auto; padding-left: 36px;" class="month-scroll-wrapper">
   <div id="monthLabelsContainer" class="month-labels"></div>
  </div>

  <div style="display: flex; align-items: flex-start; width: 100%;">
   <div id="dayLabelsContainer" class="day-labels-column"></div>
   <div class="graph-scroll-wrapper">
    <div id="contributionGrid" class="contribution-grid"></div>
   </div>
  </div>
 </div>

 <div id="tooltip" class="tooltip"></div>

 <script>
  (function() {
   const currentYear = new Date().getFullYear();
   document.getElementById('yearBadge').textContent = currentYear;

   // ---------- BUILD DATES FOR CURRENT YEAR (JAN 1 – DEC 31) ----------
   const yearStart = new Date(currentYear, 0, 1);
   const yearEnd = new Date(currentYear, 11, 31, 23, 59, 59);

   function getStartSunday(date) {
    const d = new Date(date);
    const day = d.getDay();
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
      inYear: dateObj.getFullYear() === currentYear
     });
     cursor.setDate(cursor.getDate() + 1);
    }
    weeks.push(week);
   }

   // ---------- MOCK VISIT DATA ----------
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
      const randomVisits = Math.floor(Math.random() * 16);
      day.visits = randomVisits;
      if (randomVisits === 0) day.level = 0;
      else if (randomVisits <= 3) day.level = 1;
      else if (randomVisits <= 7) day.level = 2;
      else if (randomVisits <= 12) day.level = 3;
      else day.level = 4;

      if (day.date.getTime() === today.getTime()) {
       day.visits = 15;
       day.level = 4;
      }
     }
    }
   }
   generateMockData(weeks);

   // ---------- RENDERING ----------
   const gridContainer = document.getElementById('contributionGrid');
   const monthLabelsContainer = document.getElementById('monthLabelsContainer');
   const dayLabelsContainer = document.getElementById('dayLabelsContainer');
   const tooltip = document.getElementById('tooltip');

   gridContainer.innerHTML = '';
   monthLabelsContainer.innerHTML = '';
   dayLabelsContainer.innerHTML = '';

   // Day labels
   const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
   const visibleDays = [1, 3, 5];
   for (let row = 0; row < 7; row++) {
    const labelDiv = document.createElement('div');
    labelDiv.className = 'day-label';
    labelDiv.textContent = visibleDays.includes(row) ? dayNames[row] : '';
    dayLabelsContainer.appendChild(labelDiv);
   }

   // Month labels
   function renderMonthLabels() {
    const monthPositions = [];
    let lastMonth = -1;

    for (let w = 0; w < weeks.length; w++) {
     const firstDay = weeks[w][0].date;
     if (firstDay.getFullYear() !== currentYear) continue;

     const month = firstDay.getMonth();
     if (month !== lastMonth) {
      const monthName = firstDay.toLocaleString('default', {
       month: 'short'
      });
      monthPositions.push({
       name: monthName,
       weekIndex: w
      });
      lastMonth = month;
     }
    }

    const labelArray = new Array(weeks.length).fill('');
    monthPositions.forEach(p => {
     labelArray[p.weekIndex] = p.name;
    });

    monthLabelsContainer.style.display = 'flex';
    labelArray.forEach((text) => {
     const span = document.createElement('span');
     span.className = 'month-label';
     span.textContent = text;
     monthLabelsContainer.appendChild(span);
    });
   }
   renderMonthLabels();

   // Build grid
   weeks.forEach((week) => {
    const columnDiv = document.createElement('div');
    columnDiv.className = 'week-column';

    week.forEach((day) => {
     const cell = document.createElement('div');
     cell.className = 'day-cell';

     if (day.inYear) {
      cell.setAttribute('data-level', day.level);
      cell.setAttribute('data-visits', day.visits);
     } else {
      cell.setAttribute('data-level', 0);
      cell.setAttribute('data-visits', 0);
      cell.style.opacity = '0.35';
     }

     cell.setAttribute('data-date', day.date.toISOString().split('T')[0]);
     cell.setAttribute('aria-label', `${day.date.toDateString()} — ${day.inYear ? day.visits + ' visits' : 'outside year'}`);

     const attachTooltip = (e) => {
      const rect = cell.getBoundingClientRect();
      const dateStr = day.date.toDateString();
      const visitInfo = day.inYear ? `${day.visits} visit${day.visits !== 1 ? 's' : ''}` : 'outside year';
      tooltip.textContent = `${dateStr}: ${visitInfo}`;
      tooltip.classList.add('show');

      const tooltipHeight = tooltip.offsetHeight || 30;
      const scrollY = window.scrollY || window.pageYOffset;
      let left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2;
      let top = rect.top + scrollY - tooltipHeight - 6;

      if (left < 10) left = 10;
      if (left + tooltip.offsetWidth > window.innerWidth - 10) {
       left = window.innerWidth - tooltip.offsetWidth - 10;
      }
      tooltip.style.left = `${left}px`;
      tooltip.style.top = `${top}px`;
     };

     cell.addEventListener('mouseenter', attachTooltip);
     cell.addEventListener('mouseleave', () => tooltip.classList.remove('show'));

     cell.addEventListener('touchstart', (e) => {
      e.preventDefault();
      attachTooltip(e);
      setTimeout(() => tooltip.classList.remove('show'), 1500);
     });

     columnDiv.appendChild(cell);
    });

    gridContainer.appendChild(columnDiv);
   });

   // Sync scroll between month labels and grid
   const gridScrollWrapper = document.querySelector('.graph-scroll-wrapper');
   const monthScrollWrapper = document.querySelector('.month-scroll-wrapper');

   if (gridScrollWrapper && monthScrollWrapper) {
    gridScrollWrapper.addEventListener('scroll', () => {
     monthScrollWrapper.scrollLeft = gridScrollWrapper.scrollLeft;
    });

    monthScrollWrapper.addEventListener('scroll', () => {
     gridScrollWrapper.scrollLeft = monthScrollWrapper.scrollLeft;
    });
   }

   // Update gaps on resize for mobile
   function updateGaps() {
    const isMobile = window.innerWidth <= 480;
    const gap = isMobile ? '2px' : '3px';

    if (gridContainer) gridContainer.style.gap = gap;
    if (monthLabelsContainer) monthLabelsContainer.style.gap = gap;
    if (dayLabelsContainer) dayLabelsContainer.style.gap = gap;

    const weekColumns = document.querySelectorAll('.week-column');
    weekColumns.forEach(col => col.style.gap = gap);
   }

   window.addEventListener('resize', updateGaps);
   updateGaps();

   document.querySelector('.contribution-container').addEventListener('mouseleave', () => {
    tooltip.classList.remove('show');
   });

  })();
 </script>
</body>

</html>