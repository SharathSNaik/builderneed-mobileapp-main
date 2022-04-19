// $(".afterActive").append(
            //   '<div class="target bg-white text-dark mt-2" style="border-radius:13px;' +
            //     style +
            //     '"><div style="border-radius:13px;margin-left:5px;" class="py-2 bg-white"><div class="row" style="padding-left:10px;padding-right:10px;"><div class="col-6 divtest mt-2" id="headingOne' +
            //     leadid +
            //     '" data-toggle="collapse" data-target="#collapseOne' +
            //     leadid +
            //     '" aria-expanded="true" aria-controls="collapseOne' +
            //     leadid +
            //     '"><span class="font-weight-bold">' +
            //     name +
            //     '</span></div><div class="col"></div><div class="col"><a target="_blank" href=tel:' +
            //     jsonData.data[i].phone +
            //     '><div class="circle" ' +
            //     colors +
            //     '><i class="fa fa-phone"></i></div></a></div></div></div><div id="collapseOne' +
            //     leadid +
            //     '" class="collapse" aria-labelledby="headingOne' +
            //     leadid +
            //     '" data-parent="#accordionExample"><div><div class="no-gutters living" style="margin-left:10px;"><div class="col"><div class="px-2 text-center ' +
            //     class_ +
            //     '">Assigned To : ' +
            //     jsonData.data[i].agentassn +
            //     ' <hr></div><div class="px-2"><select class="form-control agents"  data-val=' +
            //     jsonData.data[i].lid +
            //     ' onChange=assignedAgent(this); ></select><hr></div><div id="collapseOne' +
            //     leadid +
            //     '" class="collapse" aria-labelledby="headingOne' +
            //     leadid +
            //     '" data-parent="#accordionExample"><hr><div class="px-3"><span class="font-weight-bold"><i class="fa fa-info-circle text-success"></i> Status :</span> <span  class="status_db' +
            //     leadid +
            //     '">' +
            //     status +
            //     '</span></div><br><div><div class="row text-center"><div class="col-3"><center><div class="status-info" style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-info-circle"  style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><a href="schedule.php?leadid=' +
            //     leadid +
            //     "&phone=" +
            //     jsonData.data[i].phone +
            //     "&email=" +
            //     jsonData.data[i].email +
            //     '"><div class="sitvisit" style="background: white;height:50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;"><i class="fa fa-clock-o"  style="color: #100DD1;line-height:2.5;"></i></div></a></center></div><div class="col-3"><center><div style="color: #100DD1;background: white;height: 50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;" onclick="reminderShow(this);" data-name ="' +
            //     name +
            //     '" data-phone="' +
            //     jsonData.data[i].phone +
            //     '" data-lid="' +
            //     leadid +
            //     '" data-toggle="modal" data-target="#basicModal"><i class="fa fa-bell" style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="col-3"><center><div style="background: white;height: 50px;width:50px;border-radius:50%;box-shadow: 2px 2px 10px #888888;" class="trigger" data-phone="' +
            //     jsonData.data[i].phone +
            //     '" data-email="' +
            //     jsonData.data[i].email +
            //     '" onclick="trigger(this);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope-open" style="color: #100DD1;line-height:2.5;"></i></div></center></div><div class="status py-1 px-3 mt-2"><hr><div onclick=statusUpdate(this,7, ' +
            //     leadid +
            //     ");><span>First Call</span><hr></div><div onclick=statusUpdate(this,8, " +
            //     leadid +
            //     ");><span>Not Answered</span><hr></div><hr><div onclick=statusUpdate(this,6," +
            //     leadid +
            //     ");><span>Hot Lead</span></div><hr><div onclick=statusUpdate(this,1," +
            //     leadid +
            //     ");><span>Visit 1 Completed</span><hr></div><div onclick=statusUpdate(this,2," +
            //     leadid +
            //     ");><span>Visit 2 Completed</span><hr></div><div onclick=setLID(" +
            //     leadid +
            //     ")  data-toggle='modal' data-target='#exampleModals' onclick=statusUpdate(this,3," +
            //     leadid +
            //     ");><span >Unit Shortlisting</span><hr></div><div onclick=statusUpdate(this,4," +
            //     leadid +
            //     ");><span>Move to buyer</span><hr></div><div onclick=statusUpdate(this,5," +
            //     leadid +
            //     ");><span>Not Interested</span></div></div><div class='py-2'></div></div></div></div></div></div></div></div>"
            // );