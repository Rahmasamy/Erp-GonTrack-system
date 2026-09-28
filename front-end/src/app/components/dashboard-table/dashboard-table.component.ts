import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
@Component({
  selector: 'app-dashboard-table',
  standalone: true,
  imports: [CommonModule,RouterLink],
  templateUrl: './dashboard-table.component.html',
  styleUrl: './dashboard-table.component.css',
})
export class DashboardTableComponent {
  // @Input() clints: any = [];
  @Input() data: any = [];
  // @Input() payments: any = [];
  // @Input() employee: any = [];
  // @Input() dailyExpines: any = [];
  constructor() {
    // this.data;
    // console.log(this.data)
  }
  ngOnIt() {
    this.data;
  }
  ngOnChanges(changes: SimpleChanges): void {
    console.log(changes, 'changes');
  }
}
