@extends('template/masterlayout')

@section('title')

@stop
<?php
$storenumber = Auth::user()->store;
if( $storenumber == "99999") {
    $storenumber = "All Stores";
}
?>
@section('breadcrumb')
<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Orders for  </li>
@stop

@section('main')

        <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="box-title">
                      Orders for {{ $storenumber }}
                      <!-- SHOW ONLY:
                      <a href=""><span class="label label-primary">new</span></a>
                      <a href=""><span class="label label-info">recieved</span></a>
                      <a href=""><span class="label label-warning">processed</span></a>
                      <a href=""><span class="label label-default">in transit</span></a>
                      <a href=""><span class="label label-success">arrived</span></a>
                      <a href=""><span class="label label-danger">completed</span></a> -->

                        <small>
                            @foreach ($types as $t )
                                <a href="/orders/{{ $t->id }}"><span class="label label-primary">{{ $t->status }}</span></a>
                            @endforeach

                            <!-- <span class="label label-info">recieved</span>
                            <span class="label label-warning">processed</span>
                            <span class="label label-default">in transit</span>
                            <span class="label label-success">arrived</span>
                            <span class="label label-danger">completed</span> -->
                        </small>
                  </div>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th></th>
                      <th>Order #</th>
                      <th>Status</th>
                      <th>Customer</th>
                      <th>Staff</th>
                      <th>Date</th>

                      <th>Description</th>
                    </tr>

                    @foreach($orders as $order)

                    <?php
                        $customer = Customer::find( $order->customer );
                        $status = OrderStatus::find( $order->status );
                        $staff = User::find( $order->staff );

                        switch( $status->status ){

                            case "new":
                                $statusLabelClass = "label-primary";
                            break;

                            case "recieved":
                                $statusLabelClass = "label-info";
                            break;

                            case "processed":
                                $statusLabelClass = "label-warning";
                            break;

                            case "in transit":
                                $statusLabelClass = "label-default";
                            break;

                            case "arrived":
                                $statusLabelClass = "label-success";
                            break;

                            case "completed":
                                $statusLabelClass = "label-completed";
                            break;

                            default:
                                $statusLabelClass = "label-primary";
                            break;
                        }
                    ?>
                    <tr>
                        <td><a href="/order/{{ $order->id }}">
                            <button type="button" class="btn btn-default btn-xs">
                                <span class="fa fa-eye" aria-hidden="true"></span> View
                            </button>
                            </a>
                        </td>
                        <td><a href="/order/{{ $order->id }}">{{ $order->id }}</a></td>
                        <td><span class="label {{ $statusLabelClass }}">{{ $status->status }}</span></td>
                        <td><a href="/customer/{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</a></td>
                        <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
                        <td>{{ $order->created_at }}</td>

                        <td>{{ str_limit($order->description, $limit = 60, $end = '...') }}</td>
                    </tr>

                    @endforeach

                  </tbody></table>

                  <?php echo $orders->links(); ?>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>


@stop
