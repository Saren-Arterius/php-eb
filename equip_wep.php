<?php
        echo "װ��<hr>";
        GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');
        $UsrWepA = explode('<!>',$GameVal['wepa']);
        $UsrWepB = explode('<!>',$GameVal['wepb']);
        $UsrWepC = explode('<!>',$GameVal['wepc']);
        $UsrWepD = explode('<!>',$GameVal['eqwep']);
        
        //��������(Ev)
        if ($UsrWepA[1] >= 1000 || $UsrWepB[1] >= 1000 || $UsrWepC[1] >= 1000){        
        GetWeaponDetails("$UsrWepA[0]",'SysWepE_A');
        if ($UsrWepA[2]){
        if ($UsrWepA[2]==1) $SysWepE_A['name'] = $UsrWepA[3].$SysWepE_A['name']."<sub>?</sub>";
        else $SysWepE_A['name'] = $SysWepE_A['name'].$UsrWepA[3]."<sub>?</sub>";
        $SysWepE_A['atk'] += $UsrWepA[4];
        $SysWepE_A['hit'] += $UsrWepA[5];
        $SysWepE_A['rd'] += $UsrWepA[6];
        $SysWepE_A['enc'] = $UsrWepA[7];
        }
        GetWeaponDetails("$UsrWepB[0]",'SysWepE_B');
        if ($UsrWepB[2]){
        if ($UsrWepB[2]==1) $SysWepE_B['name'] = $UsrWepB[3].$SysWepE_B['name']."<sub>?</sub>";
        else $SysWepE_B['name'] = $SysWepE_B['name'].$UsrWepB[3]."<sub>?</sub>";
        $SysWepE_B['atk'] += $UsrWepB[4];
        $SysWepE_B['hit'] += $UsrWepB[5];
        $SysWepE_B['rd'] += $UsrWepB[6];
        $SysWepE_B['enc'] = $UsrWepB[7];
        }
        GetWeaponDetails("$UsrWepC[0]",'SysWepE_C');
        if ($UsrWepC[2]){
        if ($UsrWepC[2]==1) $SysWepE_C['name'] = $UsrWepC[3].$SysWepE_C['name']."<sub>?</sub>";
        else $SysWepE_C['name'] = $SysWepE_C['name'].$UsrWepC[3]."<sub>?</sub>";
        $SysWepE_C['atk'] += $UsrWepC[4];
        $SysWepE_C['hit'] += $UsrWepC[5];
        $SysWepE_C['rd'] += $UsrWepC[6];
        $SysWepE_C['enc'] = $UsrWepC[7];
        }
        unset($AvailEvFlag);
        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"665\">";
        echo "<form action=equip.php?action=evolution method=post name=evwepform>";
        echo "<input type=hidden value='evolution' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='validcode2' name=evfrom>";
        echo "<input type=hidden value='validcode3' name=evto>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<tr align=center><td colspan=8><b>��������: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">ԭ�����</td>";
        echo "<td width=\"85\">��������</td>";
        echo "</tr>";
        echo "<script language=\"Javascript\">";
        echo "function cfmev(slot,aevto){";
        echo "if (confirm('ȷ��Ҫ�����������') == true){evwepform.evfrom.value=slot;evwepform.evto.value=aevto;evwepform.submit();}else{return false}";
        echo "}";
        echo "</script>";
        $NextEv_A = explode(',',$SysWepE_A['nextev']);
        $NextEv_B = explode(',',$SysWepE_B['nextev']);
        $NextEv_C = explode(',',$SysWepE_C['nextev']);
        if ($NextEv_A[0] != 0 && $UsrWepA[1] >= 1000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_A[name]</font> ����Ŀ�����: </b></td></tr>";
        for($c_ev_a=1;$c_ev_a<= count($NextEv_A);$c_ev_a++){$c_ev=$c_ev_a-1;
        GetWeaponDetails("$NextEv_A[$c_ev]","EvWepE_A");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_A[name]</td>";
        echo "<td width=\"80\">$EvWepE_A[atk]</td>";
        echo "<td width=\"30\">$EvWepE_A[hit]</td>";
        echo "<td width=\"30\">$EvWepE_A[rd]</td>";
        echo "<td width=\"40\">$EvWepE_A[enc]</td>";
        $EvWepASpecs = ReturnSpecs($EvWepE_A['spec']);
        echo "<td width=\"120\">$EvWepASpecs</td>";
        echo "<td width=\"85\">$EvWepE_A[price]</td>";
        echo "<td width=\"85\"><input type=button value=ȷ�ϸ��� onClick=\"cfmev('wepa','$NextEv_A[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_A['spec']) || ereg('(FortressOnly)+',$EvWepE_A['spec']) || ereg('(RawMaterials)+',$EvWepE_A['spec'])) echo " disabled";
        echo "></td></tr>";$AvailEvFlag='1';}                }
        if ($NextEv_B[0] != 0 && $UsrWepB[1] >= 1000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_B[name]</font> ����Ŀ�����: </b></td></tr>";
        for($c_ev_b=1;$c_ev_b<= count($NextEv_B);$c_ev_b++){$c_ev=$c_ev_b-1;
        GetWeaponDetails("$NextEv_B[$c_ev]","EvWepE_B");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_B[name]</td>";
        echo "<td width=\"80\">$EvWepE_B[atk]</td>";
        echo "<td width=\"30\">$EvWepE_B[hit]</td>";
        echo "<td width=\"30\">$EvWepE_B[rd]</td>";
        echo "<td width=\"40\">$EvWepE_B[enc]</td>";
        $EvWepBSpecs = ReturnSpecs($EvWepE_B['spec']);
        echo "<td width=\"120\">$EvWepBSpecs</td>";
        echo "<td width=\"85\">$EvWepE_B[price]</td>";
        echo "<td width=\"85\"><input type=button value=ȷ�ϸ��� onClick=\"cfmev('wepb','$NextEv_B[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_B['spec']) || ereg('(FortressOnly)+',$EvWepE_B['spec'])) echo " disabled";
        echo "></td></tr>";$AvailEvFlag='1';}                }
        if ($NextEv_C[0] != 0 && $UsrWepC[1] >= 1000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_C[name]</font> ����Ŀ�����: </b></td></tr>";
        for($c_ev_c=1;$c_ev_c<= count($NextEv_C);$c_ev_c++){$c_ev=$c_ev_c-1;
        GetWeaponDetails("$NextEv_C[$c_ev]","EvWepE_C");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_C[name]</td>";
        echo "<td width=\"80\">$EvWepE_C[atk]</td>";
        echo "<td width=\"30\">$EvWepE_C[hit]</td>";
        echo "<td width=\"30\">$EvWepE_C[rd]</td>";
        echo "<td width=\"40\">$EvWepE_C[enc]</td>";
        $EvWepCSpecs = ReturnSpecs($EvWepE_C['spec']);
        echo "<td width=\"120\">$EvWepCSpecs</td>";
        echo "<td width=\"85\">$EvWepE_C[price]</td>";
        echo "<td width=\"85\"><input type=button value=ȷ�ϸ��� onClick=\"cfmev('wepc','$NextEv_C[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_C['spec']) || ereg('(FortressOnly)+',$EvWepE_C['spec'])) echo " disabled";
        echo "></td></tr>";$AvailEvFlag='1';}                }
        if (!$AvailEvFlag){echo "<tr align=center><td colspan=8>��ʱû���κ��и�������Ե�������</td></tr>";}
        echo "</form></table>";
        echo "<br><hr width=75%>";        }
        if (($UsrWepA[0])||($UsrWepB[0])||($UsrWepC[0]))
        //�������⻯(Spec Ev)
        if ($UsrWepA[1] >= 2000 || $UsrWepB[1] >= 2000 || $UsrWepC[1] >= 2000){        
        unset($AvailSevFlag);
        GetWeaponDetails("$UsrWepA[0]",'SysWepE_A');
        if ($UsrWepA[2]){
        if ($UsrWepA[2]==1) $SysWepE_A['name'] = $UsrWepA[3].$SysWepE_A['name']."<sub>?</sub>";
        else $SysWepE_A['name'] = $SysWepE_A['name'].$UsrWepA[3]."<sub>?</sub>";
        $SysWepE_A['atk'] += $UsrWepA[4];
        $SysWepE_A['hit'] += $UsrWepA[5];
        $SysWepE_A['rd'] += $UsrWepA[6];
        $SysWepE_A['enc'] = $UsrWepA[7];
        }
        GetWeaponDetails("$UsrWepB[0]",'SysWepE_B');
        if ($UsrWepB[2]){
        if ($UsrWepB[2]==1) $SysWepE_B['name'] = $UsrWepB[3].$SysWepE_B['name']."<sub>?</sub>";
        else $SysWepE_B['name'] = $SysWepE_B['name'].$UsrWepB[3]."<sub>?</sub>";
        $SysWepE_B['atk'] += $UsrWepB[4];
        $SysWepE_B['hit'] += $UsrWepB[5];
        $SysWepE_B['rd'] += $UsrWepB[6];
        $SysWepE_B['enc'] = $UsrWepB[7];
        }
        GetWeaponDetails("$UsrWepC[0]",'SysWepE_C');
        if ($UsrWepC[2]){
        if ($UsrWepC[2]==1) $SysWepE_C['name'] = $UsrWepC[3].$SysWepE_C['name']."<sub>?</sub>";
        else $SysWepE_C['name'] = $SysWepE_C['name'].$UsrWepC[3]."<sub>?</sub>";
        $SysWepE_C['atk'] += $UsrWepC[4];
        $SysWepE_C['hit'] += $UsrWepC[5];
        $SysWepE_C['rd'] += $UsrWepC[6];
        $SysWepE_C['enc'] = $UsrWepC[7];
        }
        echo "<script language=\"Javascript\">";
        echo "function cfmsev(slot,aevto){";
        echo "if (confirm('ȷ��Ҫ����ǿ����������') == true){sevwepform.evfrom.value=slot;sevwepform.evto.value=aevto;sevwepform.submit();}else{return false}";
        echo "}";
        echo "</script>";
        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"665\">";
        echo "<form action=equip.php?action=evolution method=post name=sevwepform>";
        echo "<input type=hidden value='sevolution' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='validcode2' name=evfrom>";
        echo "<input type=hidden value='validcode3' name=evto>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<tr align=center><td colspan=8><b>��������ǿ��: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">ԭ�����</td>";
        echo "<td width=\"85\">����ǿ��</td>";
        echo "</tr>";
        $NextEv_A = explode(',',$SysWepE_A['specev']);
        $NextEv_B = explode(',',$SysWepE_B['specev']);
        $NextEv_C = explode(',',$SysWepE_C['specev']);
        if ($NextEv_A[0] != 0 && $UsrWepA[1] >= 2000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_A[name]</font> ����ǿ���Ŀ�����: </b></td></tr>";
        for($c_ev_a=1;$c_ev_a<= count($NextEv_A);$c_ev_a++){$c_ev=$c_ev_a-1;
        GetWeaponDetails("$NextEv_A[$c_ev]","EvWepE_A");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_A[name]</td>";
        echo "<td width=\"80\">$EvWepE_A[atk]</td>";
        echo "<td width=\"30\">$EvWepE_A[hit]</td>";
        echo "<td width=\"30\">$EvWepE_A[rd]</td>";
        echo "<td width=\"40\">$EvWepE_A[enc]</td>";
        $EvWepASpecs = ReturnSpecs($EvWepE_A['spec']);
        echo "<td width=\"120\">$EvWepASpecs</td>";
        echo "<td width=\"85\">$EvWepE_A[price]</td>";
        echo "<td width=\"85\"><input type=button value=����ǿ�� onClick=\"cfmsev('wepa','$NextEv_A[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_A['spec']) || ereg('(FortressOnly)+',$EvWepE_A['spec']) || ereg('(RawMaterials)+',$EvWepE_A['spec'])) echo " disabled";
        echo "></td></tr>";$AvailSevFlag = '1';}                }
        if ($NextEv_B[0] != 0 && $UsrWepB[1] >= 2000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_B[name]</font> ����ǿ���Ŀ�����: </b></td></tr>";
        for($c_ev_b=1;$c_ev_b<= count($NextEv_B);$c_ev_b++){$c_ev=$c_ev_b-1;
        GetWeaponDetails("$NextEv_B[$c_ev]","EvWepE_B");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_B[name]</td>";
        echo "<td width=\"80\">$EvWepE_B[atk]</td>";
        echo "<td width=\"30\">$EvWepE_B[hit]</td>";
        echo "<td width=\"30\">$EvWepE_B[rd]</td>";
        echo "<td width=\"40\">$EvWepE_B[enc]</td>";
        $EvWepBSpecs = ReturnSpecs($EvWepE_B['spec']);
        echo "<td width=\"120\">$EvWepBSpecs</td>";
        echo "<td width=\"85\">$EvWepE_B[price]</td>";
        echo "<td width=\"85\"><input type=button value=����ǿ�� onClick=\"cfmsev('wepb','$NextEv_B[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_B['spec']) || ereg('(FortressOnly)+',$EvWepE_B['spec'])) echo " disabled";
        echo "></td></tr>";$AvailSevFlag = '1';}                }
        if ($NextEv_C[0] != 0 && $UsrWepC[1] >= 2000)        {
        echo "<tr align=center><td colspan=8><b><font color='yellow'>$SysWepE_C[name]</font> ����ǿ���Ŀ�����: </b></td></tr>";
        for($c_ev_c=1;$c_ev_c<= count($NextEv_C);$c_ev_c++){$c_ev=$c_ev_c-1;
        GetWeaponDetails("$NextEv_C[$c_ev]","EvWepE_C");
        echo "<tr align=center>";
        echo "<td width=\"195\">$EvWepE_C[name]</td>";
        echo "<td width=\"80\">$EvWepE_C[atk]</td>";
        echo "<td width=\"30\">$EvWepE_C[hit]</td>";
        echo "<td width=\"30\">$EvWepE_C[rd]</td>";
        echo "<td width=\"40\">$EvWepE_C[enc]</td>";
        echo "<td width=\"40\">$EvWepE_C[enc]</td>";
        $EvWepCSpecs = ReturnSpecs($EvWepE_C['spec']);
        echo "<td width=\"85\">$EvWepE_C[price]</td>";
        echo "<td width=\"85\"><input type=button value=����ǿ�� onClick=\"cfmsev('wepc','$NextEv_C[$c_ev]');\"";
        if(ereg('(CannotEquip)+',$EvWepE_C['spec']) || ereg('(FortressOnly)+',$EvWepE_C['spec'])) echo " disabled";
        echo "></td></tr>";$AvailSevFlag = '1';}                }
        if (!$AvailSevFlag){echo "<tr align=center><td colspan=8>��ʱû���κ�������ǿ�������Ե�������</td></tr>";}
        echo "</form></table>";
        echo "<br><hr width=75%>";        }
        //End Spec Ev
        if ($GenVal['msuit'] != 0){
        if (($UsrWepB[0])||($UsrWepC[0])||($UsrWepD[0]))
        {
                unset($AvailEqWFlag);
        //װ������
        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"580\">";
        echo "<form action=equip.php?action=equipwep method=post name=equipwepform>";
        echo "<input type=hidden value='equip' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='validcode2' name=slot_sw>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<tr align=center><td colspan=8><b>װ������: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">װ��</td>";
        echo "</tr>";
        if ($UsrWepB[0]){        
        GetWeaponDetails("$UsrWepB[0]",'SysWepB');
        if ($UsrWepB[2]){
        if ($UsrWepB[2]==1) $SysWepB['name'] = $UsrWepB[3].$SysWepB['name']."<sub>?</sub>";
        else $SysWepB['name'] = $SysWepB['name'].$UsrWepB[3]."<sub>?</sub>";
        $SysWepB['atk'] += $UsrWepB[4];
        $SysWepB['hit'] += $UsrWepB[5];
        $SysWepB['rd'] += $UsrWepB[6];
        $SysWepB['enc'] = $UsrWepB[7];
        }
        if ($SysWepB['equip'] != 2){
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepB[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepB['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepB[hit]</td>";
        echo "<td width=\"30\">$SysWepB[rd]</td>";
        echo "<td width=\"40\">$SysWepB[enc]</td>";
        $SysWepBSpecs = ReturnSpecs($SysWepB['spec']);
        echo "<td width=\"120\">$SysWepBSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=װ�������� onClick=\"equipwepform.slot_sw.value='wepb';\"";
        if(ereg('(CannotEquip)+',$SysWepB['spec']) || ereg('(FortressOnly)+',$SysWepB['spec']) || ereg('(RawMaterials)+',$SysWepB['spec'])) echo " disabled";
        echo "></td></tr>";$AvailEqWFlag = '1';}}
        if ($UsrWepC[0]){        
        GetWeaponDetails("$UsrWepC[0]",'SysWepC');
        if ($UsrWepC[2]){
        if ($UsrWepC[2]==1) $SysWepC['name'] = $UsrWepC[3].$SysWepC['name']."<sub>?</sub>";
        else $SysWepC['name'] = $SysWepC['name'].$UsrWepC[3]."<sub>?</sub>";
        $SysWepC['atk'] += $UsrWepC[4];
        $SysWepC['hit'] += $UsrWepC[5];
        $SysWepC['rd'] += $UsrWepC[6];
        $SysWepC['enc'] = $UsrWepC[7];
        }
        if ($SysWepC['equip'] != 2){
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepC[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepC['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepC[hit]</td>";
        echo "<td width=\"30\">$SysWepC[rd]</td>";
        echo "<td width=\"40\">$SysWepC[enc]</td>";
        $SysWepCSpecs = ReturnSpecs($SysWepC['spec']);
        echo "<td width=\"120\">$SysWepCSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=װ�������� onClick=\"equipwepform.slot_sw.value='wepc';\"";
        if(ereg('(CannotEquip)+',$SysWepC['spec']) || ereg('(FortressOnly)+',$SysWepC['spec']) || ereg('(RawMaterials)+',$SysWepC['spec'])) echo " disabled";
        echo "></td></tr>";$AvailEqWFlag = '1';}}
        if ($UsrWepD[0]){        
        GetWeaponDetails("$UsrWepD[0]",'SysWepD');
        if ($UsrWepD[2]){
        if ($UsrWepD[2]==1) $SysWepD['name'] = $UsrWepD[3].$SysWepD['name']."<sub>?</sub>";
        else $SysWepD['name'] = $SysWepD['name'].$UsrWepD[3]."<sub>?</sub>";
        $SysWepD['atk'] += $UsrWepD[4];
        $SysWepD['hit'] += $UsrWepD[5];
        $SysWepD['rd'] += $UsrWepD[6];
        $SysWepD['enc'] = $UsrWepD[7];
        }
        if ($SysWepD['equip'] != 2 && $SysWepA['equip']){
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepD[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepD['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepD[hit]</td>";
        echo "<td width=\"30\">$SysWepD[rd]</td>";
        echo "<td width=\"40\">$SysWepD[enc]</td>";
        $SysWepDSpecs = ReturnSpecs($SysWepD['spec']);
        echo "<td width=\"120\">$SysWepDSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=λ��ת�� onClick=\"equipwepform.slot_sw.value='eqwep';\"></td>";
        echo "</tr>";$AvailEqWFlag = '1';}}
        if (!$AvailEqWFlag){echo "<tr align=center><td colspan=8>��ʱû���κ���װ����������</td></tr>";}
        echo "</form></table>";
        echo "<br><hr width=75%><br>";
        }
        
        
        //����װ��
        unset($AvailEqEFlag);
        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"580\">";
        echo "<form action=equip.php?action=equipwep method=post name=equipdefform>";
        echo "<input type=hidden value='equipdef' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='validcode2' name=slot_sw>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<tr align=center><td colspan=8><b>����װ��: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">װ��</td>";
        echo "</tr>";
        
        if ($UsrWepD[0]){
        GetWeaponDetails("$UsrWepD[0]",'SysWepD');
        if ($UsrWepD[2]){
        if ($UsrWepD[2]==1) $SysWepD['name'] = $UsrWepD[3].$SysWepD['name']."<sub>?</sub>";
        else $SysWepD['name'] = $SysWepD['name'].$UsrWepD[3]."<sub>?</sub>";
        $SysWepD['atk'] += $UsrWepD[4];
        $SysWepD['hit'] += $UsrWepD[5];
        $SysWepD['rd'] += $UsrWepD[6];
        $SysWepD['enc'] = $UsrWepD[7];
        }
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepD[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepD['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepD[hit]</td>";
        echo "<td width=\"30\">$SysWepD[rd]</td>";
        echo "<td width=\"40\">$SysWepD[enc]</td>";
        $SysWepDSpecs = ReturnSpecs($SysWepD['spec']);
        echo "<td width=\"120\">$SysWepDSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=ж�´�װ�� onClick=\"equipdefform.slot_sw.value='eqwep';\"></td>";
        echo "</tr>";}
        
        if ($UsrWepB[0]){
        GetWeaponDetails("$UsrWepB[0]",'SysWepB');
        if ($UsrWepB[2]){
        if ($UsrWepB[2]==1) $SysWepB['name'] = $UsrWepB[3].$SysWepB['name']."<sub>?</sub>";
        else $SysWepB['name'] = $SysWepB['name'].$UsrWepB[3]."<sub>?</sub>";
        $SysWepB['atk'] += $UsrWepB[4];
        $SysWepB['hit'] += $UsrWepB[5];
        $SysWepB['rd'] += $UsrWepB[6];
        $SysWepB['enc'] = $UsrWepB[7];
        }
        if ($SysWepB['equip']){
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepB[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepB['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepB[hit]</td>";
        echo "<td width=\"30\">$SysWepB[rd]</td>";
        echo "<td width=\"40\">$SysWepB[enc]</td>";
        $SysWepBSpecs = ReturnSpecs($SysWepB['spec']);
        echo "<td width=\"120\">$SysWepBSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=װ�� onClick=\"equipdefform.slot_sw.value='wepb';\"></td>";
        echo "</tr>";$AvailEqEFlag = '1';}}
        if ($UsrWepC[0]){        
        GetWeaponDetails("$UsrWepC[0]",'SysWepC');
        if ($UsrWepC[2]){
        if ($UsrWepC[2]==1) $SysWepC['name'] = $UsrWepC[3].$SysWepC['name']."<sub>?</sub>";
        else $SysWepC['name'] = $SysWepC['name'].$UsrWepC[3]."<sub>?</sub>";
        $SysWepC['atk'] += $UsrWepC[4];
        $SysWepC['hit'] += $UsrWepC[5];
        $SysWepC['rd'] += $UsrWepC[6];
        $SysWepC['enc'] = $UsrWepC[7];
        }
        if ($SysWepC['equip']){
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepC[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepC['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepC[hit]</td>";
        echo "<td width=\"30\">$SysWepC[rd]</td>";
        echo "<td width=\"40\">$SysWepC[enc]</td>";
        $SysWepCSpecs = ReturnSpecs($SysWepC['spec']);
        echo "<td width=\"120\">$SysWepCSpecs</td>";
        echo "<td width=\"85\"><input type=submit value=װ�� onClick=\"equipdefform.slot_sw.value='wepc';\"></td>";
        echo "</tr>";$AvailEqEFlag = '1';}}
        if (!$AvailEqEFlag){echo "<tr align=center><td colspan=8>��ʱû���κ��Գ�Ϊ����װ����������</td></tr>";}
        echo "</form></table>";
        echo "<br><hr width=75%><br>";
        
        
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"600\">";
        echo "<form action=equip.php?action=buywep method=post name=buywepform>";
        echo "<input type=hidden value='process' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<tr align=center><td colspan=8><b>�����б�: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"20\">No.</td>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">��Ǯ</td>";
        echo "</tr>";
unset($CEqOpt);
if (!$GameVal['wepa'])
$CEqOpt = "AND `equip` != '2'";
$wepsqlsel = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE `kind` REGEXP '.*B.*' AND `price` <= '$GenVal[cash]' $CEqOpt ORDER BY familyid, price, grade");
$reswep = mysql_query($wepsqlsel);
$syswepbuyinfo = mysql_fetch_array($reswep);
$syswepbuynumsrows = mysql_num_rows($reswep);
if ($syswepbuynumsrows > 0){
$countbw1=0;
$wepbuyoptions='';
        do
        {$countbw1++;
        echo "<tr align=center>";
        echo "<td width=\"20\">$countbw1</td>";
        echo "<td width=\"195\">$syswepbuyinfo[name]</td>";
        echo "<td width=\"80\">". number_format($syswepbuyinfo['atk']) ."</td>";
        echo "<td width=\"30\">$syswepbuyinfo[hit]</td>";
        echo "<td width=\"30\">$syswepbuyinfo[rd]</td>";
        echo "<td width=\"40\">$syswepbuyinfo[enc]</td>";
        $syswepbuyinfospecs = ReturnSpecs($syswepbuyinfo['spec']);
        echo "<td width=\"120\">$syswepbuyinfospecs</td>";
        echo "<td width=\"85\">". number_format($syswepbuyinfo['price']) ."</td>";
        echo "</tr>";
        if(!ereg('(CannotEquip)+',$syswepbuyinfo['spec'])){
                if ($UsrWepA[0] != 0 || !$syswepbuyinfo['equip'])
                $wepbuyoptions .= "<option value=$syswepbuyinfo[id] vid='$syswepbuyinfo[name]'>$syswepbuyinfo[name](No. $countbw1)\n";
        }
        }
        while ( $syswepbuyinfo = mysql_fetch_array($reswep) );
        echo "<tr align=center><td colspan=8><b>ѡ��������: </b>";
        if ($UsrWepA[0]&&$UsrWepB[0]&&$UsrWepC[0]){
        $disBW = 'disabled';$disBW_mes = '<br>��û�ж�����Ŀռ���Է�����������';}
        else $disBW = 'enabled';
        echo "<script language=\"Javascript\">";
        echo "function cfmbuy(){";
        echo "if (confirm('ȷ��Ҫ������') == true){buywepform.BuyWepDesired.disabled=false;buywepform.submit()}else{buywepform.BuyWepDesired.disabled=false;buywepform.cfmbuybutton.disabled=false;return false}";
        echo "}";
        echo "</script>";
        echo "<select name=BuyWepDesired $disBW>";
        echo $wepbuyoptions ;
        echo "</select>";
        echo "<input type=button value='����' name=cfmbuybutton OnClick=\"buywepform.BuyWepDesired.disabled=true;this.disabled=true;cfmbuy()\" $disBW>$disBW_mes";
        //echo "<input type=submit value='����' name=cfmbuybutton $disBW>$disBW_mes";
        echo "</td></tr>";
        echo "</form></table>";
}
}else echo "û�л��壬���ܹ�����������";

if (($UsrWepA[0])||($UsrWepB[0])||($UsrWepC[0] || !$UsrWepC[0]))
        {
        echo "<br><hr width=75%><br>";
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"580\">";

        echo "<tr align=center><td colspan=8><b>��ɳ��۵������б�: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">���ռ�Ǯ</td>";
        echo "</tr>";
        
        $SellW_Option ='';
        if ($UsrWepA[0]){        
        GetWeaponDetails("$UsrWepA[0]",'SysWepA');
        if ($UsrWepA[2]){
        if ($UsrWepA[2]==1) $SysWepA['name'] = $UsrWepA[3].$SysWepA['name']."<sub>?</sub>";
        else $SysWepA['name'] = $SysWepA['name'].$UsrWepA[3]."<sub>?</sub>";
        $SysWepA['atk'] += $UsrWepA[4];
        $SysWepA['hit'] += $UsrWepA[5];
        $SysWepA['rd'] += $UsrWepA[6];
        $SysWepA['enc'] = $UsrWepA[7];
        }
        $SellP_A = Floor(($SysWepA['price']*0.5 + $SysWepA['price']*0.1)/10000)*10000;
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepA[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepA['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepA[hit]</td>";
        echo "<td width=\"30\">$SysWepA[rd]</td>";
        echo "<td width=\"40\">$SysWepA[enc]</td>";
        $SysWepASpecs = ReturnSpecs($SysWepA['spec']);
        echo "<td width=\"120\">$SysWepASpecs</td>";
        echo "<td width=\"85\">". number_format($SellP_A) ."</td>";
        echo "</tr>"; //$SellW_Options .= "<option value=WepA>$SysWepA[name](ʹ��������)\n";
        }
        if ($UsrWepB[0]){        
        GetWeaponDetails("$UsrWepB[0]",'SysWepB');
        if ($UsrWepB[2]){
        if ($UsrWepB[2]==1) $SysWepB['name'] = $UsrWepB[3].$SysWepB['name']."<sub>?</sub>";
        else $SysWepB['name'] = $SysWepB['name'].$UsrWepB[3]."<sub>?</sub>";
        $SysWepB['atk'] += $UsrWepB[4];
        $SysWepB['hit'] += $UsrWepB[5];
        $SysWepB['rd'] += $UsrWepB[6];
        $SysWepB['enc'] = $UsrWepB[7];
        }
        $SellP_B = Floor(($SysWepB['price']*0.5 + $SysWepB['price']*0.1)/10000)*10000;
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepB[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepB['atk']) ."</td>";
        echo "<td width=\"30\">$SysWepB[hit]</td>";
        echo "<td width=\"30\">$SysWepB[rd]</td>";
        echo "<td width=\"40\">$SysWepB[enc]</td>";
        $SysWepBSpecs = ReturnSpecs($SysWepB['spec']);
        echo "<td width=\"120\">$SysWepBSpecs</td>";
        echo "<td width=\"85\">". number_format($SellP_B) ."</td>";
        echo "</tr>"; $SellW_Options .= "<option value=WepB>$SysWepB[name](��������һ)\n";}
        if ($UsrWepC[0]){        
        GetWeaponDetails("$UsrWepC[0]",'SysWepC');
        if ($UsrWepC[2]){
        if ($UsrWepC[2]==1) $SysWepC['name'] = $UsrWepC[3].$SysWepC['name']."<sub>?</sub>";
        else $SysWepC['name'] = $SysWepC['name'].$UsrWepC[3]."<sub>?</sub>";
        $SysWepC['atk'] += $UsrWepC[4];
        $SysWepC['hit'] += $UsrWepC[5];
        $SysWepC['rd'] += $UsrWepC[6];
        $SysWepC['enc'] = $UsrWepC[7];
        }
        $SellP_C = Floor(($SysWepC['price']*0.5 + $SysWepC['price']*0.1)/10000)*10000;
        echo "<tr align=center>";
        echo "<td width=\"195\">$SysWepC[name]</td>";
        echo "<td width=\"80\">". number_format($SysWepC[atk]) ."</td>";
        echo "<td width=\"30\">$SysWepC[hit]</td>";
        echo "<td width=\"30\">$SysWepC[rd]</td>";
        echo "<td width=\"40\">$SysWepC[enc]</td>";
        $SysWepCSpecs = ReturnSpecs($SysWepC['spec']);
        echo "<td width=\"120\">$SysWepCSpecs</td>";
        echo "<td width=\"85\">". number_format($SellP_C) ."</td>";
        echo "</tr>"; $SellW_Options .= "<option value=WepC>$SysWepC[name](����������)\n";}
        echo "<form action=equip.php?action=sellwep method=post name=sellwepform>";
        echo "<input type=hidden value='process' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<tr align=center><td colspan=7><b>�۳�����: </b>";
        if ($SellW_Options){
        echo "<select name=SellWepDesired>";
        echo $SellW_Options;
        echo "</select>";
        echo "<script language=\"Javascript\">";
        echo "function cfmsell(){";
        echo "if (confirm('ȷ��Ҫ�۳���') == true){sellwepform.SellWepDesired.disabled=false;sellwepform.submit()}else{sellwepform.SellWepDesired.disabled=false;sellwepform.cfmsellbutton.disabled=false;return false}";
        echo "}";
        echo "</script>";
        echo "<input type=button value='ȷ��' OnClick=\"sellwepform.SellWepDesired.disabled=true;this.disabled=true;cfmsell()\" name=cfmsellbutton>";
        }else echo "û�п����۳���������";
        echo "</form><form action=equip.php?action=sellwep2 method=post name=sellwepform2>";
        echo "<input type=hidden value='process' name=actionb>";
        echo "<input type=hidden value='validcode' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";    
        echo "<b>�ŵ������г�: </b>";
        if ($SellW_Options){
        echo "<select name=SellWepDesired2>";
        echo $SellW_Options;
        echo "</select>";
        echo "�۸�<input type=text name='price' size=10 >";
        echo "<script language=\"Javascript\">";
        echo "function cfmsell2(){";
        echo "if (confirm('ȷ��Ҫ������۸�ŵ������г���') == true){sellwepform2.SellWepDesired2.disabled=false;sellwepform2.submit()}else{sellwepform2.SellWepDesired2.disabled=false;sellwepform2.cfmsellbutton2.disabled=false;return false}";
        echo "}";
        echo "</script>";
        echo "<input type=button value='ȷ��' OnClick=\"sellwepform2.SellWepDesired2.disabled=true;this.disabled=true;cfmsell2()\" name=cfmsellbutton2>";
        }else echo "û�п��Էŵ������г���������";

        echo "</td></tr></form></table><br>";
        }
        postFooter();
?>