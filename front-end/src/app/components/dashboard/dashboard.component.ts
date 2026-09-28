import { Component, Input } from '@angular/core';
import { TableComponent } from '../table/table.component';
import { PaginationComponent } from '../pagination/pagination.component';
import { HeaderComponent } from '../header/header.component';
import { SidebarComponent } from '../sidebar/sidebar.component';
import { HeaderBottomComponent } from '../header-bottom/header-bottom.component';
import { RouterOutlet } from '@angular/router';
import { DashboardService } from '../../servises/dashboard.service';
import { DashboardTableComponent } from '../dashboard-table/dashboard-table.component';

@Component({
  selector: 'app-dashboard',
  standalone: true,
  imports: [
    TableComponent,
    PaginationComponent,
    HeaderComponent,
    SidebarComponent,
    HeaderBottomComponent,
    RouterOutlet,
    DashboardTableComponent,
  ],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css',
})
export class DashboardComponent {
  data: any = [];
  constructor(private dashboardServise: DashboardService) {
    this.getAlldashboard();
    this.data;
  }

  getAlldashboard() {
    this.dashboardServise.getAlldashboard().subscribe(
      (response) => {
        console.log(response);
        this.data = response;
        console.log(this.data);
      },
      (err) => {
        console.log(err);
      }
    );
  }
}
