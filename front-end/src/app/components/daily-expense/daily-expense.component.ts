import { Component } from '@angular/core';
import { TableComponent } from "../table/table.component";

@Component({
  selector: 'app-daily-expense',
  standalone: true,
  imports: [TableComponent],
  templateUrl: './daily-expense.component.html',
  styleUrl: './daily-expense.component.css'
})
export class DailyExpenseComponent {

}
